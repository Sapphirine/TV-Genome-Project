import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.List;

import org.apache.mahout.cf.taste.common.TasteException;
import org.apache.mahout.cf.taste.impl.common.LongPrimitiveIterator;
import org.apache.mahout.cf.taste.impl.model.BooleanUserPreferenceArray;
import org.apache.mahout.cf.taste.impl.model.PlusAnonymousConcurrentUserDataModel;
import org.apache.mahout.cf.taste.impl.model.PlusAnonymousUserDataModel;
import org.apache.mahout.cf.taste.impl.model.file.FileDataModel;
import org.apache.mahout.cf.taste.impl.neighborhood.NearestNUserNeighborhood;
import org.apache.mahout.cf.taste.impl.neighborhood.ThresholdUserNeighborhood;
import org.apache.mahout.cf.taste.impl.recommender.GenericBooleanPrefItemBasedRecommender;
import org.apache.mahout.cf.taste.impl.recommender.GenericItemBasedRecommender;
import org.apache.mahout.cf.taste.impl.recommender.GenericUserBasedRecommender;
import org.apache.mahout.cf.taste.impl.recommender.svd.ALSWRFactorizer;
import org.apache.mahout.cf.taste.impl.recommender.svd.SVDRecommender;
import org.apache.mahout.cf.taste.impl.similarity.EuclideanDistanceSimilarity;
import org.apache.mahout.cf.taste.impl.similarity.LogLikelihoodSimilarity;
import org.apache.mahout.cf.taste.impl.similarity.PearsonCorrelationSimilarity;
import org.apache.mahout.cf.taste.impl.similarity.TanimotoCoefficientSimilarity;
import org.apache.mahout.cf.taste.model.DataModel;
import org.apache.mahout.cf.taste.neighborhood.UserNeighborhood;
import org.apache.mahout.cf.taste.recommender.RecommendedItem;
import org.apache.mahout.cf.taste.recommender.UserBasedRecommender;
import org.apache.mahout.cf.taste.similarity.ItemSimilarity;
import org.apache.mahout.cf.taste.similarity.UserSimilarity;

import com.sun.xml.bind.v2.runtime.unmarshaller.XsiNilLoader.Array;

public class App {
	
	//Method to recommend for anonymous users (to generate recommendation per item)
	public static List<RecommendedItem> recommendForAnonymous(long [] items, int howMany, 
			PlusAnonymousUserDataModel dataModel, GenericBooleanPrefItemBasedRecommender recommender_item) 
            throws TasteException {
		
		//Create an anonymous user id
		long ID = PlusAnonymousUserDataModel.TEMP_USER_ID;
		//Create a preference array of items for user
        BooleanUserPreferenceArray anonymousPrefs = new BooleanUserPreferenceArray(items.length);
        //Label item at index 0 to the new user ID
        anonymousPrefs.setUserID(0,ID);
        //Or if there are multiple set all to user ID
        for (int i=0; i<items.length; i++) {
            anonymousPrefs.setItemID(i, items[i]);
            anonymousPrefs.setUserID(i,ID);
        }
        //Inject the anonymous preferences into the data model
        dataModel.setTempPrefs(anonymousPrefs);
        //Generate 'howMany' recommendations
        List<RecommendedItem>  recommendations = recommender_item.recommend(ID, howMany);
        return recommendations;
    }
	
	
	public static void main(String[] args) throws IOException, TasteException{
		//Create data model from ratings file
		DataModel model = new FileDataModel(new File("ratings_1__perc_total_hrs_filtered.csv000"));
		//Generate new model to be able to add anonymous users and make recommendations
		PlusAnonymousUserDataModel AddModel = new PlusAnonymousUserDataModel(model);
		//Generate similarity and recommender
		EuclideanDistanceSimilarity sim = new EuclideanDistanceSimilarity(model);
		GenericBooleanPrefItemBasedRecommender recommender_item =new  GenericBooleanPrefItemBasedRecommender(AddModel,sim);
		//File to print out to (directory should be changed)
		File f = new File("Reccomend_Out.txt");
		f.createNewFile();
		FileWriter fw = new FileWriter(f.getAbsoluteFile());
		BufferedWriter bw = new BufferedWriter(fw);
		int count = 0;
		bw.write("series_id,rec_series_id,rating,rank" + "\n");
		// for each item in the csv/datamodel, recommend 10 other items and print the recommendations to the outfile
		for(LongPrimitiveIterator Items = model.getItemIDs(); Items.hasNext();){
			long currentitem = Items.nextLong();
			long [] items = {currentitem};
			System.out.println(count++);
			List<RecommendedItem> newrec = recommendForAnonymous(items, 10,AddModel,recommender_item);
			int rank=1;
			for (RecommendedItem rec: newrec){
				//System.out.println(currentitem + "," + rec.getItemID() + "," + rec.getValue() + ","+ rank +"\n");
				bw.write(currentitem + "," + rec.getItemID() + "," + rec.getValue() + ","+ rank +"\n");
				rank++;
			}
			
		}
		bw.close();
	}

}     
