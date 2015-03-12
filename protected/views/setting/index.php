<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<div class="view">
    <h1>Настройки</h1>

    <?php if (Yii::app()->user->hasFlash('setting')): ?>

        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('setting'); ?>
        </div>

    <?php endif; ?>
    <div class="form">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'setting-form',
            'enableAjaxValidation' => false,
        )); ?>

        <?php echo $form->labelEx($model, 'defaultStatusUser'); ?>
        <?php echo $form->checkBox($model, 'defaultStatusUser'); ?>
        <?php echo $form->error($model, 'defaultStatusUser'); ?>
        <br/>
        <h3>Настройки комментариев</h3>
        <?php echo $form->labelEx($model, 'defaultStatusComment'); ?>
        <?php echo $form->checkBox($model, 'defaultStatusComment'); ?>
        <?php echo $form->error($model, 'defaultStatusComment'); ?>

        <br/>
        <?php echo $form->labelEx($model, 'GuestComment'); ?>
        <?php echo $form->checkBox($model, 'GuestComment'); ?>
        <?php echo $form->error($model, 'GuestComment'); ?>
        <br/>


            <?php echo $form->labelEx($model,'useCaptcha'); ?>
            <?php echo $form->checkBox($model,'useCaptcha'); ?>
            <?php echo $form->error($model,'useCaptcha'); ?>
        <br/>

            <?php echo $form->labelEx($model,'allowSubcommenting'); ?>
            <?php echo $form->checkBox($model,'allowSubcommenting'); ?>
            <?php echo $form->error($model,'allowSubcommenting'); ?>
        <br/>


        <?php echo CHtml::submitButton('Применить', array(
            'class' => 'btn btn-primary'
        )); ?>


        <?php $this->endWidget(); ?>

    </div>
    <!-- form -->
</div>

