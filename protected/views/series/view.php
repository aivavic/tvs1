<?php
/* @var $this SeriesController */
/* @var $model Series */


?>
<div class="view">
<h1>Серия <?php echo $model->name; ?></h1>

	<b><?php echo CHtml::encode($model->getAttributeLabel('date'))?>:</b>
	<?php echo CHtml::encode($model->date) . '</br>';?>

	<b><?php echo CHtml::encode($model->getAttributeLabel('description'))?>:</b>
	<?php echo CHtml::encode($model->description). '</br>' ;?>

	<b><?php echo CHtml::encode($model->getAttributeLabel('url'))?>:</b>
	<?php echo CHtml::encode($model->url);?>


	<?php $this->widget('comments.widgets.ECommentsListWidget', array(
	'model' => $model,
	)); ?>

</div>