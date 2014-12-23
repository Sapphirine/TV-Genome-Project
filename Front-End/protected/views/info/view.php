<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Infos'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	//array('label'=>'Create Info', 'url'=>array('create')),
	//array('label'=>'Update Info', 'url'=>array('update', 'id'=>$model->series_id)),
	//array('label'=>'Delete Info', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->series_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>View Info #<?php echo $model->series_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'series_id',
		'Title',
		'Plot',
		'avg_duration',
		'actors',
		'type',
		'genre',
		'runtime',
		'categories',
		'url',
		'perc_users',
		'imdbRating',
		'Year',
		'AMG_genre',
	),
)); ?>
