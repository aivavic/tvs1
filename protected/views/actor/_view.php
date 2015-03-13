<?php
/* @var $this ActorController */
/* @var $data Actor */
?>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'actor-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


    <div class="view">

        <?php echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $data->image, '', array(
            'class' => 'actor-photo',
            'width' => '120px',));; ?>
        <div class="box-right">

            <?php echo CHtml::encode($data->firstname) . ' ' . CHtml::encode($data->lastname) . '</br>'; ?>
            <b><?php echo CHtml::encode($data->getAttributeLabel('datebirth')); ?>:</b>
            <?php echo CHtml::encode($data->datebirth, array(
                'class' => 'datebirth',
            )); ?>
            <br/>

            <b><?php echo CHtml::encode($data->getAttributeLabel('placebirth')); ?>:</b>
            <?php echo CHtml::encode($data->placebirth); ?>
            <br/>

            <b><?php echo CHtml::encode($data->getAttributeLabel('activities')); ?>:</b>
            <?php echo ($data->activities); ?>
            <br/>

            <b><?php echo CHtml::encode($data->getAttributeLabel('achievements')); ?>:</b>
            <?php echo ($data->achievements); ?>
            <br/>

            <b><?php echo CHtml::encode($data->getAttributeLabel('biography')); ?>:</b>
            <?php echo ($data->biography); ?>
            <br/>

        </div>
        <?php if (Yii::app()->user->role == 2): ?>
            <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/edit.gif"), array('update', 'id' => $data->id)); ?>
        <?php endif; ?>

    </div>
<?php $this->endWidget(); ?>