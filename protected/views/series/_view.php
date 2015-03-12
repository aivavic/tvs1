<?php
/* @var $this SeriesController */
/* @var $data Series */
?>

<div class="view">




	<b><?php echo CHtml::encode($data->getAttributeLabel('id_season')); ?>:</b>
	<?php echo CHtml::encode($data->id_season); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


	<?php

	echo '<pre>';
	print_r($data);
	echo '</pre>';


	/*
	<b><?php echo CHtml::encode($data->getAttributeLabel('director')); ?>:</b>
	<?php echo CHtml::encode($data->director); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating_user')); ?>:</b>
	<?php echo CHtml::encode($data->rating_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating_private')); ?>:</b>
	<?php echo CHtml::encode($data->rating_private); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating_IMDb')); ?>:</b>
	<?php echo CHtml::encode($data->rating_IMDb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre')); ?>:</b>
	<?php echo CHtml::encode($data->genre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	*/ ?>

</div>