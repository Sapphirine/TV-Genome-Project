
import urllib
import requests
import json
import difflib
import pprint

try:
	from urllib.request import urlopen
	from urllib.parse import urlparse
	from urllib.parse import urlencode
except ImportError:	
	from urlparse import urlparse
	from urllib2 import urlopen
	from urllib import urlencode
	

def create_series_dictionary(amg_series_info_file):
	# must be in the order of series_id, title, genre, categories, avg_duration_hrs, perc_users
	#in this case it is file named 'series_info.csv000'
	ID_Series_Dict = {}
	Info = open(amg_series_info_file,'r')
	count = 0
	for line in Info:
		line = line.split('|')
		ID_Series_Dict[line[0]] = {}
		ID_Series_Dict[line[0]]['title'] = line[1]
		ID_Series_Dict[line[0]]['AMG_genre'] = line[2]
		ID_Series_Dict[line[0]]['categories'] = line[3]
		ID_Series_Dict[line[0]]['avg_duration_hrs'] = line[4]
		ID_Series_Dict[line[0]]['perc_users'] = line[5][:-1]
	return ID_Series_Dict

#creates a new recommendation file with headers in this order:
#series_id, series_title, recommended series id, recommended series title, recommendation rank

def create_title_ratings_file(ID_Series_Dict, Recommendation_File, NewRecommendation_File):

	RecFile = open(Recommendation_File,'r')
	NewRecFile = open(NewRecommendation_File,'w')
	count = 0
	for line in RecFile:
		if count == 0:
			NewRecFile.write('"'+ "|".join(['series_id','series_title',
										'rec_series_id','rec_series_title','rank'])+'"'+'\n')
			count +=1
		else:
			line = line[:-1].split(',')
			series_id = line[0]
			rec_id = line[1]
			line.append(ID_Series_Dict[series_id]['title'])
			line.append(ID_Series_Dict[rec_id]['title'])
			out = [line[0],line[4],line[1],line[5],line[3]]
			#write to file enclosed in "" and terminated with \n
			NewRecFile.write('"'+ "|".join(out)+'"'+'\n')
	NewRecFile.close()


#Get all the series used in the recommendation file
def get_unique_series(Recommendation_File):
	included_series = []
	Used_Series = open(Recommendation_File, 'r')
	count = 0 
	for line in Used_Series:
		#If not the header
		if count>0:
			line = line.split(',')
			included_series.append(line[0])
		count +=1
	ret = list(set(included_series))
	#return a set of unique series
	return ret


#IMDBShowCsv = open('/Users/Sam/Desktop/School/BigData/Project/IMDBShowInfo.csv', 'w')
def create_imdb_info(IMDBShowInfoFile, ID_Series_Dict, included_series):

	IMDB = open(IMDBShowInfoFile,'w')
	#Include these headers in this order
	header_array = ['series_id', 'Title','title', 'Plot', 'Rated', 'avg_duration_hrs', 'Actors', 'Type',  'Released', 'Genre', 'Runtime', 'categories', 'url', 'imdbID', 'perc_users', 'imdbRating', 'Year', 'AMG_genre']
	header = "|".join(header_array)+'\n'
	IMDB.write(header)

	count = 0
	#for every show in the included series id's
	for show in included_series:
		#print to see progress
		if count %100==0:
			print count
		count += 1

		#get the information in the seriesid dictionary
		showinfo = ID_Series_Dict[show]
		#get information to search in imdb api
		showurl = showinfo['title'].lower().replace(" ", '+')
		#initiate array to be written to file
		ToCsv = []
		#try to find the show on imdb
		try:
			imdbinfo = json.loads(requests.get('http://www.omdbapi.com/?t='+showurl+'&y=&plot=full&r=json').content)
		except:
			#if we can't find it only add the information from AMG
			for header in header_array:
				if header == 'series_id':
					ToCsv.append(show)
				elif header in ID_Series_Dict[show].keys():
					ToCsv.append(ID_Series_Dict[show][header])
				else:	
					ToCsv.append('N/A')
		else:
			#if we can find it add the info from imdb and AMG (excluding the title from AMG or else we would have 2 titles)
			for header in header_array:
				if header == 'series_id':
					ToCsv.append(show)
				elif header in imdbinfo.keys():
					ToCsv.append(imdbinfo[header].encode('utf8'))
				elif header in ID_Series_Dict[show].keys() and header != 'title':
					ToCsv.append(ID_Series_Dict[show][header])
				elif header =='url' and 'imdbID' in imdbinfo.keys():
					ToCsv.append('http://www.imdb.com/title/'+ imdbinfo['imdbID'].encode('utf8') + '/?ref_=nv_sr_1' )
				else:	
					ToCsv.append('N/A')
		#join line by | and end each line with \n then write it to the file
		line = '|'.join(ToCsv)+'\n'
		IMDB.write(line)

	IMDB.close()


amg_series_info_file = '/Users/Sam/Desktop/School/BigData/Project/series_info.csv000'
Recommendation_File = '/Users/Sam/Desktop/School/BigData/Project/Recommend_Out.csv'
NewRecommendation_File = '/Users/Sam/Desktop/School/BigData/Project/NewRecommend_Out.csv'
IMDBShowInfoFile = '/Users/Sam/Desktop/School/BigData/Project/IMDBShowInfo.txt'
	

ID_Series_Dict = create_series_dictionary(amg_series_info_file)
create_title_ratings_file(ID_Series_Dict, Recommendation_File, NewRecommendation_File)
included_series = get_unique_series(Recommendation_File)
create_imdb_info(IMDBShowInfoFile, ID_Series_Dict, included_series)

