<?php
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'=>array_merge(
            $model->thread->getBreadcrumbs(true),
            array('Редактирование записи')
        ),
    ));
?>

<div class="form" style="margin:20px;">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'post-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
	),
    )); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'content'); ?>
            <?php echo $form->textArea($model,'content', array('rows'=>10, 'cols'=>70)); ?>
            <?php echo $form->error($model,'content'); ?>
            <p class="hint">
                Подсказка: Вы можете использовать <?php echo CHtml::link('markdown', 'http://daringfireball.net/projects/markdown/syntax'); ?> синтаксис!
            </p>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Отправить'); ?>
        </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
