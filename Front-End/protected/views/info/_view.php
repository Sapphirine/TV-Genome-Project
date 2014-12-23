<?php
/* @var $this InfoController */
/* @var $data Info */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('series_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->series_id), array('view', 'id'=>$data->series_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Plot')); ?>:</b>
	<?php echo CHtml::encode($data->Plot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avg_duration')); ?>:</b>
	<?php echo CHtml::encode($data->avg_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actors')); ?>:</b>
	<?php echo CHtml::encode($data->actors); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre')); ?>:</b>
	<?php echo CHtml::encode($data->genre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('runtime')); ?>:</b>
	<?php echo CHtml::encode($data->runtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories')); ?>:</b>
	<?php echo CHtml::encode($data->categories); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perc_users')); ?>:</b>
	<?php echo CHtml::encode($data->perc_users); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imdbRating')); ?>:</b>
	<?php echo CHtml::encode($data->imdbRating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Year')); ?>:</b>
	<?php echo CHtml::encode($data->Year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AMG_genre')); ?>:</b>
	<?php echo CHtml::encode($data->AMG_genre); ?>
	<br />

</div>