<div class="view clearfix col-lg-4">
    <?php echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $data->image, '', array(
        'class' => 'actor-photo pull-left ',
        'width' => '80px',
    ));; ?>
    <div class="box-right">
        <b><?php echo CHtml::encode($data->firstname . ' ' . $data->lastname) ?></b>
    </div>

<?php $model = new ActorTvseries; ?>
    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'ActorTvseries-form',
            'enableAjaxValidation' => false,
        )
    );
    ?>

    <div class="field">
        <?php echo $form->hiddenField($model, 'id_series', ['value' => $tvs_id]); ?>
        <?php echo $form->hiddenField($model, 'id_actor', ['value' => $data->id]); ?>
    </div>
    <div class="field">
        <?php echo $form->labelEx($model, 'role'); ?><br/>
        <?php echo $form->textField($model, 'role', ['class'=>'form-active']); ?>
        <?php //echo $form->error($model, 'imdbVotes'); ?>
    </div>

    <div class="field buttons">
        <?php echo CHtml::submitButton('Save', ['class' => "btn btn-info"]); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>