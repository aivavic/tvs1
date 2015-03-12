<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
$this->description = 'Login';
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<article class="view col-lg-4" id="login_">
<h1 class="noshadow">Вход</h1>
	<p class="btn btn-info registration"><?php echo CHtml::link('Регистрация <i class="fa fa-arrow-right"></i>', array(
			'registration',
		)); ?></p>
<p>Пожалуйста, представьтесь:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны.</p>

	<div class="field">
		<?php echo $form->labelEx($model,'username') ?>
		<?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password') . '</br>'; ?>
		<p class="hint bg-info text-info">
			Hint: You may login with <kbd>user4</kbd>/<kbd>user4</kbd>.
		</p>
	</div>

	<div class="field rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="field buttons" >
		<?php echo CHtml::submitButton('Вход', array('class'=>'btn btn-info col-lg-12', )); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</article>
