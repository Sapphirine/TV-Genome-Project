<?php
/* @var $this RecommendController */
/* @var $model Recommend */

$this->breadcrumbs=array(
	'Recommends'=>array('index'),
	$model->a,
);

$this->menu=array(
	array('label'=>'List Recommend', 'url'=>array('index')),
	//array('label'=>'Create Recommend', 'url'=>array('create')),
	//array('label'=>'Update Recommend', 'url'=>array('update', 'id'=>$model->a)),
	//array('label'=>'Delete Recommend', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->a),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Get Recommendation', 'url'=>array('admin')),
);
?>

<h1>View Recommendation #<?php echo $model->a; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'series_title',
		'rec_Series_title',
		'a',
	),
)); ?>
