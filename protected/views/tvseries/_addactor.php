

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'actor-form',
    'enableAjaxValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model_actor); ?>
<div class="field">
    <?php if(!$model_actor->isNewRecord) {
        echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $model_actor->image, '', array(
            'class' => 'actor-photo',
            'width' => '120px',));;
    }
    ?>
    <?php echo $form->labelEx($model_actor,'image')  . '</br>'; ?>
    <?php echo $form->fileField($model_actor, 'image')  . '</br>'; ?>
    <?php echo $form->error($model_actor,'image')  . '</br>'; ?>
</div>
<div class="field">
    <?php echo $form->labelEx($model_actor,'firstname') . '</br>'; ?>
    <?php echo $form->textField($model_actor,'firstname',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
    <?php echo $form->error($model_actor,'firstname')  . '</br>'; ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model_actor,'lastname')  . '</br>'; ?>
    <?php echo $form->textField($model_actor,'lastname',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
    <?php echo $form->error($model_actor,'lastname')  . '</br>'; ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model_actor,'datebirth')  . '</br>'; ?>
    <?php echo $form->dateField($model_actor,'datebirth')  . '</br>'; ?>
    <?php echo $form->error($model_actor,'datebirth')  . '</br>'; ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model_actor,'placebirth')  . '</br>'; ?>
    <?php echo $form->textField($model_actor,'placebirth',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
    <?php echo $form->error($model_actor,'placebirth')  . '</br>'; ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model_actor,'activities')  . '</br>'; ?>
    <?php echo $form->textField($model_actor,'activities',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
    <?php echo $form->error($model_actor,'activities')  . '</br>'; ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model_actor,'achievements')  . '</br>'; ?>
    <?php
    $this->widget('ext.TvsWidgets.TheCKEditorWidget',array(
        'model'=>$model_actor,
        'attribute'=>'achievements',
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
    <?php echo $form->error($model_actor,'achievements')  . '</br>'; ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model_actor,'biography')  . '</br>'; ?>
    <?php
    $this->widget('ext.TvsWidgets.TheCKEditorWidget',array(
        'model'=>$model_actor,
        'attribute'=>'biography',
        'height'=>'200px',
        'width'=>'100%',
        'toolbarSet'=>'Full',
        'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
        'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
    ) );
    ?>
    <?php echo $form->error($model_actor,'biography')  . '</br>'; ?>
</div>



<div class="field buttons">
    <?php echo CHtml::submitButton($model_actor->isNewRecord ? 'Создать' : 'Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->