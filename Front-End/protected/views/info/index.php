<?php
/* @var $this InfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Infos',
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Manage Info', 'url'=>array('admin'))
);
?>
<h1>Show Ratin</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
