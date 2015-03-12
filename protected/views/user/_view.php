<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<?php echo CHtml::image(Yii::app()->baseUrl . '/upload/userPhoto'  . $data->avatar, '', array(
		'class' => 'actor-photo',
		'width' => '120px',));; ?>
	<div class="box-right">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


		<b><?php echo CHtml::encode($data->getAttributeLabel('ban')); ?>:</b>
		<?php if($data->ban == 1) {
			echo CHtml::encode('активен');
		} else {
			echo CHtml::encode('забанен');
		} ?>
		<br />


		<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
		<?php if($data->role == 2) {
			echo CHtml::encode('Администратор');
		} elseif($data->role == 1) {
			echo CHtml::encode('Пользователь');
		} ?>
		<br />


		<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
		<?php echo CHtml::encode(date('d-m-Y H:i', $data->created)); ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('visited')); ?>:</b>
		<?php echo CHtml::encode(date('d-m-Y H:i:s', $data->visited)); ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
		<?php echo CHtml::encode($data->dob); ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
		<?php

			echo CHtml::encode($data->gender_['gender']);
		 ?>
		<br />

	</div>
</div>