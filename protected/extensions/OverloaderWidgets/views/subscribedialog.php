<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'subscribes-form',
    'enableAjaxValidation' => false,
));
//echo CHtml::checkBox('По email', array('name' => 'width_email'));
//echo CHtml::checkBox('По телефону', array('name' => 'width_phone'));
echo CHtml::submitButton('Подписаться на рассылку', array('name' => 'subscribes'));
echo CHtml::hiddenField('id_subscribes', $data->id, array('id' => 'hiddenInput'));
$this->endWidget('CActiveForm');
?>
<br/>