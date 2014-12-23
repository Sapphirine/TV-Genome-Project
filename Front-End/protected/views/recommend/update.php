<?php
/* @var $this RecommendController */
/* @var $model Recommend */

$this->breadcrumbs=array(
	'Recommends'=>array('index'),
	$model->a=>array('view','id'=>$model->a),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recommend', 'url'=>array('index')),
	array('label'=>'Create Recommend', 'url'=>array('create')),
	array('label'=>'View Recommend', 'url'=>array('view', 'id'=>$model->a)),
	array('label'=>'Manage Recommend', 'url'=>array('admin')),
);
?>

<h1>Update Recommend <?php echo $model->a; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>