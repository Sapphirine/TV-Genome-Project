<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Infos'=>array('index'),
	$model->Title=>array('view','id'=>$model->series_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'View Info', 'url'=>array('view', 'id'=>$model->series_id)),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>Update Info <?php echo $model->series_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>