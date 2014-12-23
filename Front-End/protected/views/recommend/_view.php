<?php
/* @var $this RecommendController */
/* @var $data Recommend */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('series_title')); ?>:</b>
	<?php echo CHtml::encode($data->series_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rec_Series_title')); ?>:</b>
	<?php echo CHtml::encode($data->rec_Series_title); ?>
	<br />


</div>