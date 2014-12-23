<?php

/**
 * This is the model class for table "info".
 *
 * The followings are the available columns in table 'info':
 * @property integer $series_id
 * @property string $Title
 * @property string $IMDB_Title
 * @property string $Plot
 * @property string $Rated
 * @property string $avg_duration
 * @property string $actors
 * @property string $type
 * @property string $released
 * @property string $genre
 * @property string $runtime
 * @property string $categories
 * @property string $url
 * @property string $imdbID
 * @property string $perc_users
 * @property string $imdbRating
 * @property string $Year
 * @property string $AMG_genre
 */
class Info extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('series_id, Title, IMDB_Title, Plot, Rated, avg_duration, actors, type, released, genre, runtime, categories, url, imdbID, perc_users, imdbRating, Year, AMG_genre', 'required'),
			array('series_id', 'numerical', 'integerOnly'=>true),
			array('Title, IMDB_Title, avg_duration, actors, type, released, genre, runtime, url, imdbID, perc_users, imdbRating, Year, AMG_genre', 'length', 'max'=>100),
			array('Plot', 'length', 'max'=>512),
			array('Rated', 'length', 'max'=>12),
			array('categories', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('series_id, Title, IMDB_Title, Plot, Rated, avg_duration, actors, type, released, genre, runtime, categories, url, imdbID, perc_users, imdbRating, Year, AMG_genre', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'series_id' => 'Series',
			'Title' => 'Title',
			'IMDB_Title' => 'Imdb Title',
			'Plot' => 'Plot',
			'Rated' => 'Rated',
			'avg_duration' => 'Avg Duration',
			'actors' => 'Actors',
			'type' => 'Type',
			'released' => 'Released',
			'genre' => 'Genre',
			'runtime' => 'Runtime',
			'categories' => 'Categories',
			'url' => 'Url',
			'imdbID' => 'Imdb',
			'perc_users' => 'Perc Users',
			'imdbRating' => 'Imdb Rating',
			'Year' => 'Year',
			'AMG_genre' => 'Amg Genre',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('series_id',$this->series_id);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('IMDB_Title',$this->IMDB_Title,true);
		$criteria->compare('Plot',$this->Plot,true);
		$criteria->compare('Rated',$this->Rated,true);
		$criteria->compare('avg_duration',$this->avg_duration,true);
		$criteria->compare('actors',$this->actors,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('released',$this->released,true);
		$criteria->compare('genre',$this->genre,true);
		$criteria->compare('runtime',$this->runtime,true);
		$criteria->compare('categories',$this->categories,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('imdbID',$this->imdbID,true);
		$criteria->compare('perc_users',$this->perc_users,true);
		$criteria->compare('imdbRating',$this->imdbRating,true);
		$criteria->compare('Year',$this->Year,true);
		$criteria->compare('AMG_genre',$this->AMG_genre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Info the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
