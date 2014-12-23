<?php
/* @var $this RecommendController */
/* @var $model Recommend */

$this->breadcrumbs=array(
	'Recommends'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Recommend', 'url'=>array('index')),
	array('label'=>'Manage Recommend', 'url'=>array('admin')),
);
?>

<h1>Create Recommend</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>