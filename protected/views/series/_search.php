<?php
/* @var $this SeriesController */
/* @var $model Series */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'id_season'); ?>
		<?php echo $form->textField($model,'id_season'); ?>
	</div>





	<div class="row">
		<?php echo $form->label($model,'date_prod'); ?>
		<?php echo $form->textField($model,'date_prod'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->