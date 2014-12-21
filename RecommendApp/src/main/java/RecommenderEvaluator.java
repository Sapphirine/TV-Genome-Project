import java.io.File;
import java.io.IOException;

import org.apache.mahout.cf.taste.common.TasteException;
import org.apache.mahout.cf.taste.eval.RecommenderBuilder;
import org.apache.mahout.cf.taste.impl.eval.RMSRecommenderEvaluator;
import org.apache.mahout.cf.taste.impl.model.file.FileDataModel;
import org.apache.mahout.cf.taste.impl.neighborhood.NearestNUserNeighborhood;
import org.apache.mahout.cf.taste.impl.recommender.GenericBooleanPrefUserBasedRecommender;
import org.apache.mahout.cf.taste.impl.recommender.GenericItemBasedRecommender;
import org.apache.mahout.cf.taste.impl.recommender.svd.ALSWRFactorizer;
import org.apache.mahout.cf.taste.impl.recommender.svd.SVDRecommender;
import org.apache.mahout.cf.taste.impl.similarity.EuclideanDistanceSimilarity;
import org.apache.mahout.cf.taste.impl.similarity.PearsonCorrelationSimilarity;
import org.apache.mahout.cf.taste.impl.similarity.TanimotoCoefficientSimilarity;
import org.apache.mahout.cf.taste.impl.similarity.UncenteredCosineSimilarity;
import org.apache.mahout.cf.taste.model.DataModel;
import org.apache.mahout.cf.taste.neighborhood.UserNeighborhood;
import org.apache.mahout.cf.taste.recommender.Recommender;
import org.apache.mahout.cf.taste.similarity.UserSimilarity;
import org.apache.mahout.common.RandomUtils;

public class RecommenderEvaluator {

	private static int neighbourhoodSize=7;

	public static void main(String args[]){

		String [] filearray = {"ratings_1__perc_total_hrs_filtered.csv000", 
								"ratings__aggregate_filtered.csv000",
								"ratings_ratios_filtered.csv",
								"interest_ratio_days_filtered.csv000",
								"avg_ratios_filtered.csv000",
								"avg_ratios_ranked_filtered.csv000"};
		
		for(String file: filearray){
			
			System.out.println(file);
			String recsFile=file;

			//Creating Recommender Builder to test recommender performance
			
			RecommenderBuilder Item_Pearson = new RecommenderBuilder() {
				public Recommender buildRecommender(DataModel model)throws TasteException{
					//The Similarity algorithms used 
					PearsonCorrelationSimilarity sim = new PearsonCorrelationSimilarity(model);
					//Recommender
					GenericItemBasedRecommender recommender =new  GenericItemBasedRecommender(model,sim);
					return recommender;
				}
			};
			RecommenderBuilder Item_Tanimoto = new RecommenderBuilder() {
				public Recommender buildRecommender(DataModel model)throws TasteException{
					//The Similarity algorithms used 
					TanimotoCoefficientSimilarity sim = new TanimotoCoefficientSimilarity(model);
					//Recommender
					GenericItemBasedRecommender recommender =new  GenericItemBasedRecommender(model,sim);
					return recommender;
				}
			};
			RecommenderBuilder Item_Cosine = new RecommenderBuilder() {
				public Recommender buildRecommender(DataModel model)throws TasteException{
					//The Similarity algorithms used
					UncenteredCosineSimilarity sim = new UncenteredCosineSimilarity(model);
					//Recommender
					GenericItemBasedRecommender recommender =new  GenericItemBasedRecommender(model,sim);
					return recommender;
				}
			};
			RecommenderBuilder Item_Euclid = new RecommenderBuilder() {
				public Recommender buildRecommender(DataModel model)throws TasteException{
					//The Similarity algorithms used 
					EuclideanDistanceSimilarity sim = new EuclideanDistanceSimilarity(model);
					//Recommender
					GenericItemBasedRecommender recommender =new  GenericItemBasedRecommender(model,sim);
					return recommender;
				}
			};
			RecommenderBuilder ALS = new RecommenderBuilder() {
				public Recommender buildRecommender(DataModel model)throws TasteException{
					//The Similarity algorithms used 
					ALSWRFactorizer factorizer = new ALSWRFactorizer(model, 10, 0.2, 15);
					//Recommender
					SVDRecommender recommender = new SVDRecommender(model, factorizer);
					return recommender;
				}
			};
			try {

				//Use this only if the code is for unit tests and other examples to guarantee repeated results
				RandomUtils.useTestSeed();

				//Creating a data model to be passed on to RecommenderEvaluator - evaluate method
				FileDataModel dataModel = new FileDataModel(new File(recsFile));

				RMSRecommenderEvaluator evaluator = new RMSRecommenderEvaluator();
				//for obtaining Similarity Evaluation Score
				double Score_Tanimoto_Item = evaluator.evaluate(Item_Tanimoto,null,dataModel, 0.7, 1);
				System.out.println("Item Similarity Evaluation score (TanimotoCoeff) : "+Score_Tanimoto_Item);
				double Score_Pearson_Item = evaluator.evaluate(Item_Pearson,null,dataModel, 0.7, 1);
				System.out.println("Item Similarity Evaluation score (Pearson): " + Score_Pearson_Item);
				double Score_Cosine_Item = evaluator.evaluate(Item_Cosine,null,dataModel, 0.7, 1);
				System.out.println("Item Similarity Evaluation score (Cosine) : "+Score_Cosine_Item);
				double Score_ALS = evaluator.evaluate(ALS,null,dataModel, 0.7, 1);
				System.out.println("ALS Similarity Evaluation score: " + Score_ALS);
				double Score_Euclid_Item = evaluator.evaluate(Item_Euclid,null,dataModel, 0.7, 1);
				System.out.println("Item Similarity Evaluation score (Euclidean) : "+Score_Euclid_Item);
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (TasteException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
}


