<?php
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'series-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model_series); ?>


    <?php echo $form->hiddenField($model_series,'id_tvseries', ['value'=>$tvs_id]); ?>

    <div class="field">
        <?php echo $form->labelEx($model_series,'id_season'); ?>
        <?php echo $form->textField($model_series,'id_season', ['class'=>'form-control']); ?>
        <?php echo $form->error($model_series,'id_season'); ?>

    </div>











    <div class="field buttons">
        <?php echo CHtml::submitButton($model_series->isNewRecord ? 'Create' : 'Save', ['class'=>'btn btn-info']); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->