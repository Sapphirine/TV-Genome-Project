<?php
/* @var $this InfoController */
/* @var $model Info */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'series_id'); ?>
		<?php echo $form->textField($model,'series_id'); ?>
		<?php echo $form->error($model,'series_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IMDB_Title'); ?>
		<?php echo $form->textField($model,'IMDB_Title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'IMDB_Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Plot'); ?>
		<?php echo $form->textField($model,'Plot',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'Plot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Rated'); ?>
		<?php echo $form->textField($model,'Rated',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'Rated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avg_duration'); ?>
		<?php echo $form->textField($model,'avg_duration',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'avg_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actors'); ?>
		<?php echo $form->textField($model,'actors',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'actors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'released'); ?>
		<?php echo $form->textField($model,'released',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'released'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genre'); ?>
		<?php echo $form->textField($model,'genre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'genre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'runtime'); ?>
		<?php echo $form->textField($model,'runtime',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'runtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categories'); ?>
		<?php echo $form->textField($model,'categories',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'categories'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imdbID'); ?>
		<?php echo $form->textField($model,'imdbID',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'imdbID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perc_users'); ?>
		<?php echo $form->textField($model,'perc_users',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'perc_users'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imdbRating'); ?>
		<?php echo $form->textField($model,'imdbRating',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'imdbRating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Year'); ?>
		<?php echo $form->textField($model,'Year',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AMG_genre'); ?>
		<?php echo $form->textField($model,'AMG_genre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'AMG_genre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->