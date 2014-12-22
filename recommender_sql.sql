-- TV Genomics Recommender Syster Postgres SQL for Data Extraction and Input Preparation --

-- get the correct media id 
select id,date,day from media.dates where year=2014  --2193 date_id for jan 1 2014

-- grab raw tunings data
create table joshua.recommend_data as (
select fourth_wall_household_key, series_id, sum(duration)/3600.0 as total_hrs_viewed, count(id) as count_tuning_instances, count(distinct date_id) as count_days
 from media.program_tunings 
 where date_id>=2193  -- we use Jan 1, 2014 as our tuning start date
 AND fourth_wall_device_key != '000000000000' -- get rid of bad devices
 AND event_utc_start_time <= DATEADD('h',3,tuning_utc_start_time)
 group by fourth_wall_household_key, series_id  
 having sum(duration)> 3600 and count(distinct fourth_wall_device_key) <= 5
 );

-- create table with each users tuning info 
create table joshua.master_recommend_data as (
select r.fourth_wall_household_key as user_id, series_id, total_hrs_viewed as time_viewed_of_series, count_tuning_instances as series_tuning_instances,
count_days as series_days_tuned,
min_date as first_date_key_active,max_date as last_date_key_active,total_dur as total_hours_viewed,count_tuning_records as total_tuning_instances, count_date_ids as total_days_tv_watched
from joshua.user_info u inner join joshua.recommend_data r on u.fourth_wall_household_key=r.fourth_wall_household_key )

-- covert total time viewed to hours
update  joshua.master_recommend_data set total_hours_viewed=total_hours_viewed/3600.0

-- integrity check 
select * from joshua.master_recommend_data limit 1000

--send sample file for testing
unload ('select * from joshua.master_recommend_data limit 1000') to 's3://amg-analytics-1/home/joshua/activity.csv' delimiter ','  parallel off gzip
credentials 'aws_access_key_id=****;aws_secret_access_key=****';

 -- exploratory analysis on temporary table containing user information
create table joshua.user_info as
(select fourth_wall_household_key, min(date_id) as min_date,max(date_id) as max_date, sum(duration) as total_dur, count(id) as count_tuning_records, count(distinct date_id) as count_date_ids
 from media.program_tunings 
 where date_id>=2193
 AND fourth_wall_device_key != '000000000000' -- get rid of bad devices
 AND event_utc_start_time <= DATEADD('h',3,tuning_utc_start_time)
 group by fourth_wall_household_key 
 having count(distinct fourth_wall_device_key) <= 5
 );
 
-- check that it works  
select * from joshua.user_info limit 20 
 
select id,date,day from media.dates where year=2014  --2193 date_id for jan 1 2014

--  add columns # series duration per day, series duration per tuning instance, avg series duration per day, avg duration per tuning instance

alter table master_recommend_data add column series_duration_per_day float default null; 
alter table master_recommend_data add column series_duration_per_tune float default null; 
alter table master_recommend_data add column user_avg_series_dur_per_tune float default null; 
alter table master_recommend_data add column user_avg_series_dur_per_day float default null; 
select * from master_recommend_data limit 5

-- update new added columns with correct values 
update master_recommend_data set series_duration_per_day= time_viewed_of_series*1.0/series_days_tuned;
update master_recommend_data set series_duration_per_tune= time_viewed_of_series*1.0/series_tuning_instances;

update master_recommend_data  set user_avg_series_dur_per_tune= tempcol
from (select user_id, avg(series_duration_per_tune) as tempcol from master_recommend_data group by user_id) a
where a.user_id=master_recommend_data.user_id ;

update master_recommend_data  set user_avg_series_dur_per_day= tempcol
from (select user_id, avg(series_duration_per_day) as tempcol from master_recommend_data group by user_id) a
where a.user_id=master_recommend_data.user_id ;

select * from master_recommend_data limit 20 
alter table joshua.ratings_perc_total_hours rename  round to rating; 

-- create first psuedo-ratings table which is a rounded column of proportion of time spent watching tv series vs total time watched overall
create table joshua.ratings_perc_total_hours as (
select user_id, series_id, round(100*time_viewed_of_series/total_hours_viewed,4) as rating from master_recommend_data 
);
select * from joshua.ratings_perc_total_hours limit 20 

-- export full file to s3 as gzipped csv
unload ('select user_id, series_id, rating from (select user_id,series_id, rating, 
rank() over (partition by user_id order by rating desc) as pos 
from ratings_perc_total_hours) where pos < 16 and series_id is not null and user_id is not null  ') to 's3://amg-analytics-1/home/joshua/ratings_1.csv' delimiter ','  parallel off gzip
credentials 'aws_access_key_id=****;aws_secret_access_key=*****';


select user_id, series_id, rating from (select user_id,series_id, rating, 
rank() over (partition by user_id order by rating desc) as pos 
from ratings_perc_total_hours) where pos < 11 and series_id is null limit 20 

select stddev(rating) from (select user_id,series_id, rating, 
rank() over (partition by user_id order by rating desc) as pos 
from ratings_perc_total_hours) where pos < 11 and series_id is null limit 20 

select max(ratings), min(ratings) from ratings_aggregate limit 20 

drop table ratings_aggregate

-- psuedo-rating Ratings Aggregate

create table ratings_aggregate as (
select user_id, series_id, round(
(time_viewed_of_series*1.0/total_hrs_viewed)+(series_tuning_instances*1.0/total_tuning_instances)+(series_days_tuned*1.0/total_days_tv_watched),4) as ratings
from recommender_data where total_days_tv_watched >= 20 )  ; 

unload ('select user_id,series_id, ratings from (select user_id,a.series_id, ratings,
rank() over (partition by user_id order by ratings desc) as pos from
ratings_aggregate
a inner join 
( select series_id from (select series_id, count(user_id) as count_me from avg_ratios_ratings group by series_id ) where count_me>=5000 ) b
 on a.series_id=b.series_id) where pos<=15 and series_id is not null and user_id is not null ') to 's3://amg-analytics-1/home/joshua/ratings__aggregate_filtered.csv' delimiter ','  parallel off gzip
credentials 'aws_access_key_id=****;aws_secret_access_key=*****';

select max(total_days_tv_watched), min(total_days_tv_watched), avg(total_days_tv_watched), stddev(total_days_tv_watched) from recommender_data limit 20 

select max(ratings), min(ratings) from (select user_id,series_id, ratings, 
rank() over (partition by user_id order by ratings desc) as pos 
from ratings_aggregate) where pos < 16 and series_id is not null and user_id is not null 
select * from recommender_Data limit 20

drop table interest_ratio_days;
create table interest_ratio_days as (
select user_id, series_id, round(series_days_tuned*1.0/total_days_tv_watched,3) as ratings from recommender_Data where total_days_tv_watched>20);

select user_id, series_id, ratings from (select user_id,series_id, ratings, 
rank() over (partition by user_id order by ratings desc) as pos 
from interest_ratio_days) where pos < 16 and series_id is not null and user_id is not null ;

select min(ratings), max(ratings), avg(ratings), stddev(ratings) from interest_ratio_days ; 


create table interest_ratio_days as (
select user_id, series_id, round(series_days_tuned*1.0/total_days_tv_watched,3) as ratings from recommender_Data where total_days_tv_watched>20);

select * from recommender_data limit 20 
select min(ratings),max(ratings),avg(ratings) from avg_ratios_ratings limit 20 ; 
create table avg_ratios_ratings as ( select user_id , series_id , round(series_duration_per_day*1.0/user_avg_series_dur_per_day,4) as ratings from recommender_data);

select user_id, series_id, 11-pos from (select user_id,series_id, ratings, 
rank() over (partition by user_id order by ratings desc) as pos 
from avg_ratios_ratings ) where pos < 11 and series_id is not null and user_id is not null limit 200;



select count(distinct series_id) from avg_ratios_ratings limit 20 ; --34,584

select series_id, count(user_id) from avg_ratios_ratings group by series_id order by count(user_id) asc limit 100; 

select series_id from (select series_id, count(user_id) as count_me from avg_ratios_ratings group by series_id ) where count_me>=5000   ;

select user_id, series_id, 11-pos from 
where pos < 11 and series_id is not null and user_id is not null limit 200;

-- filtered rank table filtered 
select user_id, series_id, 11-pos from (
select user_id,a.series_id, ratings, 
rank() over (partition by user_id order by ratings desc) as pos 
from avg_ratios_ratings a inner join 
( select series_id from (select series_id, count(user_id) as count_me from avg_ratios_ratings group by series_id ) where count_me>=5000 ) b
 on a.series_id=b.series_id  )
 where pos < 11 and series_id is not null and user_id is not null;


avg_ratios filtered
rank table filtered 
ratings_1 filtered  ( percent of time spent watching that show) 
interest ratio filtered 

ratings_aggregate
ratings_perc_total_hours
recommender_data
avg_ratios_ratings

select * from ratings_aggregate limit 20 
select user_id,series_id, ratings from (select user_id,a.series_id, ratings,
rank() over (partition by user_id order by ratings desc) as pos from
ratings_aggregate
a inner join 
( select series_id from (select series_id, count(user_id) as count_me from avg_ratios_ratings group by series_id ) where count_me>=5000 ) b
 on a.series_id=b.series_id) where pos<=15

select max(rating) from ratings_perc_total_hours ;

select * from recommender_data limit 20 ; 
select * from media.series limit 20 ; 
select id, series_name , genre, categories,avg(series_duration_per_day) as avg_series_dur_per_day, count(user_id)*1.0/1398359 as num_users
from recommender_data inner join media.series on id=series_id
 group by id, series_name, genre, categories limit 50; 
 select count(distinct user_id ) from recommender_Data; --1398359
 
 
 -- unload table that maps series id to namea and provided various television shows 
 unload ('select id, series_name , genre, categories,avg(series_duration_per_day) as avg_series_dur_per_day, count(user_id)*1.0/1398359 as num_users
from recommender_data inner join media.series on id=series_id
 group by id, series_name, genre, categories ') to 's3://amg-analytics-1/home/joshua/series_info.csv' delimiter '|'  parallel off gzip
credentials 'aws_access_key_id=****;aws_secret_access_key=***';

select * from joshua.recommendeR_data limit 20 ; 

-- we used this to look at the distributions of how many people have seen which shows
select  series_name 
from recommender_data inner join media.series on id=series_id
 group by  series_name  order by sum(total_tuning_instances) desc limit 50 ; 
 
 -- Compute Recommender Baselines for comparisons
select * from ratings_perc_total_hours limit 20 ; 
--mean rating = 3.219 , count= 18931345 , MAE= 2.1
select sum(abs(rating-3.219))*1.0/18931345 from (
select rating from (select user_id,series_id, rating, 
rank() over (partition by user_id order by rating desc) as pos 
from ratings_perc_total_hours) where pos < 16 and series_id is not null and user_id is not null )

--mean: 2.076 , count: 20059943    , MAE=
select sum(abs(ratings-2.076))*1.0/20059943  from (
select ratings from (select user_id,series_id, ratings, 
rank() over (partition by user_id order by ratings desc) as pos 
from avg_ratios_ratings) where pos < 16 and series_id is not null and user_id is not null )

--mean: .159 , count: 18438263
select sum(abs(ratings-.159))*1.0/18438263 from (
select ratings from (select user_id,series_id, ratings, 
rank() over (partition by user_id order by ratings desc) as pos 
from interest_ratio_days) where pos < 16 and series_id is not null and user_id is not null )

--mean: .219 , count: 16599137
select sum(abs(ratings-.219))*1.0/16599137 from (
select ratings from (select user_id,series_id, ratings, 
rank() over (partition by user_id order by ratings desc) as pos 
from ratings_aggregate) where pos < 16 and series_id is not null and user_id is not null )

-- mean: 5.5 , count: 13565820
select sum(abs(pos-5.5))*1.0/13565820 from (select user_id,a.series_id, ratings,
rank() over (partition by user_id order by ratings desc) as pos from
avg_ratios_ratings
a inner join 
( select series_id from (select series_id, count(user_id) as count_me from avg_ratios_ratings group by series_id ) where count_me>=5000 ) b
 on a.series_id=b.series_id) where pos<=10 and series_id is not null and user_id is not null  ; 
 
 
 
 --- Psuedo-ratings interest ratio_days which 
 create table interest_ratio_days as (
select user_id, series_id, round(series_days_tuned*1.0/total_days_tv_watched,3) as ratings from recommender_Data where total_days_tv_watched>20);

--- ratings statistics for our various tables
select min(ratings), max(ratings), avg(ratings), stddev(ratings) from (select user_id,a.series_id, ratings,
rank() over (partition by user_id order by ratings desc) as pos from
ratings_aggregate
a inner join 
( select series_id from (select series_id, count(user_id) as count_me from avg_ratios_ratings group by series_id ) where count_me>=5000 ) b
 on a.series_id=b.series_id) where pos<=15 and series_id is not null and user_id is not null  ; 
 
 
 select * from ratings_aggregate limit 20 ; 