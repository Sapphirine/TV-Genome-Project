<?php
/* @var $this RecommendController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recommends',
);

$this->menu=array(
	//array('label'=>'Create Recommend', 'url'=>array('create')),
	array('label'=>'Get Recommendation', 'url'=>array('admin')),
);
?>

<h1>Recommendations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
