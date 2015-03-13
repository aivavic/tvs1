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
        <?php echo $form->numberField($model_series,'id_season', ['class'=>'form-control', 'min'=>1, 'max'=>200]); ?>
        <?php echo $form->error($model_series,'id_season'); ?>
    </div>

    <div class="field">
        <?php echo $form->labelEx($model_series,'name'); ?>
        <?php echo $form->numberField($model_series,'name', ['class'=>'form-control', 'min'=>1, 'max'=>200]); ?>
        <?php echo $form->error($model_series,'name'); ?>
    </div>

    <div class="field">
        <?php echo $form->labelEx($model_series,'url'); ?>
        <?php echo $form->urlField($model_series,'url', ['class'=>'form-control',
        ]); ?>
        <?php echo $form->error($model_series,'url'); ?>
    </div>

    <div class="field">
        <?php echo $form->labelEx($model_series,'description'); ?>
        <?php
        $this->widget('ext.TvsWidgets.TheCKEditorWidget',array(
            'model'=>$model_series,
            'attribute'=>'description',
            'height'=>'150px',
            'width'=>'100%',
            'toolbarSet'=>array(
                array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
                array( 'TextColor', 'BGColor' ),
            ),
            'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
            'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
        ) );
        ?>

        <?php echo $form->error($model_series,'description'); ?>
    </div>
    <div class="field">
        <?php echo $form->labelEx($model_series,'date'); ?>
        <?php echo $form->dateField($model_series,'date', ['class'=>'form-control']); ?>
        <?php echo $form->error($model_series,'date'); ?>
    </div>
    <div class="field buttons">
        <?php echo CHtml::submitButton($model_series->isNewRecord ? 'Create' : 'Save', ['class'=>'btn btn-info']); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->