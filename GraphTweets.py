from TweetSentQuery import group_date_creation
from TweetSentQuery import average_sentiment
from TweetSentQuery import percent_sentiment
from TweetSentQuery import num_tweets
from TweetSentQuery import open_connection
from TweetSentQuery import indexes
import pprint
from datetime import datetime


twitter_stream = open_connection()
indexes(twitter_stream)
avg_sent = average_sentiment(db = twitter_stream, start_date = '12-20-2014',end_date = '12-20-2014', groupby = ['hour','minute'], 
							keywords = ['nbcsvu','sportscenter','gameofthrones','breaking bad'], ID_keyword = True)
volume = num_tweets(db = twitter_stream, start_date = '12-20-2014',end_date = '12-20-2014', groupby = ['hour','minute'], 
							keywords = ['nbcsvu','sportscenter','gameofthrones','breaking bad'], ID_keyword = True)
perc_sent = percent_sentiment(db = twitter_stream, start_date = '12-20-2014',end_date = '12-20-2014', groupby = ['hour','minute'], 
							keywords = ['nbcsvu','sportscenter','gameofthrones','breaking bad'], ID_keyword = True)

min = 1000000
max = 0
min_time = ''
max_time = ''
times = []
for entry in avg_sent:
	hour = entry['_id']['hour']
	minute = entry['_id']['minute']
	time = int(str(hour)+str(minute)) if minute > 10 else int(str(hour)+'0'+str(minute))
	times.append(time)
	if time < min:
		min = int(str(hour)+str(minute))
		if minute>10:
			min_time = str(hour)+':'+str(minute)
		else:
			min_time = str(hour)+':'+'0'+str(minute)
	if time > max:
		max = int(str(hour)+str(minute))
		if minute>10:
			max_time = str(hour)+':'+str(minute)
		else:
			max_time = str(hour)+':'+'0'+str(minute)
print min_time
print max_time

times = sorted(set(times))
avg_sent_vecs = dict(zip(['nbcsvu','sportscenter','gameofthrones','breaking bad'],[[0 for x in times] for n in range(0,4)]))
volume_vecs = dict(zip(['nbcsvu','sportscenter','gameofthrones','breaking bad'],[[0 for x in times] for n in range(0,4)]))
positive_vecs = dict(zip(['nbcsvu','sportscenter','gameofthrones','breaking bad'],[[0 for x in times] for n in range(0,4)]))
negative_vecs = dict(zip(['nbcsvu','sportscenter','gameofthrones','breaking bad'],[[0 for x in times] for n in range(0,4)]))
neutral_vecs = dict(zip(['nbcsvu','sportscenter','gameofthrones','breaking bad'],[[0 for x in times] for n in range(0,4)]))

for entry in avg_sent:
	hour = entry['_id']['hour']
	minute = entry['_id']['minute']
	keyword = entry['_id']['keyword'].encode('ascii', 'ignore')
	sent = entry['avg_sentiment']
	time = int(str(hour)+str(minute)) if minute > 10 else int(str(hour)+'0'+str(minute))
	avg_sent_vecs[keyword][times.index(time)] = sent

for entry in volume:
	hour = entry['_id']['hour']
	minute = entry['_id']['minute']
	keyword = entry['_id']['keyword'].encode('ascii', 'ignore')
	volume = entry['count']
	time = int(str(hour)+str(minute)) if minute > 10 else int(str(hour)+'0'+str(minute))
	volume_vecs[keyword][times.index(time)] = volume

for entry in perc_sent:
	print entry.keys()
	hour = entry['_id']['hour']
	minute = entry['_id']['minute']
	keyword = entry['_id']['keyword'].encode('ascii', 'ignore')
	positive = entry['positive']
	negative = entry['negative']
	neutral = entry['neutral']
	if neutral >0:
		neutral_vecs[keyword][times.index(time)] = neutral
	elif positive >0:
		positive_vecs[keyword][times.index(time)] = positive
	else:
		negative_vecs[keyword][times.index(time)] = negative
	time = int(str(hour)+str(minute)) if minute > 10 else int(str(hour)+'0'+str(minute))


VOLUME = open('/Users/Sam/Desktop/FINAL BIG DATA PROJECT/volume.csv','w')
AVG_SENT = open('/Users/Sam/Desktop/FINAL BIG DATA PROJECT/avg_sent.csv','w')
POS_NEG= open('/Users/Sam/Desktop/FINAL BIG DATA PROJECT/perc_pos_neg_neu.csv','w')
string_times = [str(x)[0:2]+':'+str(x)[2:4] for x in times]


VOLUME.write('Times,'+','.join(string_times)+'\n')
AVG_SENT.write('Times,'+','.join(string_times)+'\n')
POS_NEG.write('Times,'+','.join(string_times)+'\n')

for keyword in ['nbcsvu','sportscenter','gameofthrones','breaking bad']:
	VOLUME.write(keyword+',' + ','.join([str(x) for x in volume_vecs[keyword]])+'\n')
	AVG_SENT.write(keyword+',' + ','.join([str(x) for x in avg_sent_vecs[keyword]])+'\n')
	POS_NEG.write(keyword+'_positive,' + ','.join([str(x) for x in positive_vecs[keyword]])+'\n')
	POS_NEG.write(keyword+'_negative,' + ','.join([str(x) for x in negative_vecs[keyword]])+'\n')
	POS_NEG.write(keyword+'_neutral,' + ','.join([str(x) for x in neutral_vecs[keyword]])+'\n')

	
pprint.pprint(perc_sent)


VOLUME.close()
AVG_SENT.close()
POS_NEG.close()