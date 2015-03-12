<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.03.2015
 * Time: 11:02
 */
Yii::import('zii.widgets.jui.CJuiDialog');

class SubscribeDialog extends CJuiDialog
{

    public $options = array(
        'options' => array(
            'title' => 'Выберите способ подписки',
            'autoOpen' => false,
            'show' => array(
                'effect' => 'blind',
                'duration' => 500,
            ),
            'hide' => array(
                'effect' => 'explode',
                'duration' => 500,
            ),
            'top' => '50%'
        ),
        'themeUrl' => '/css/themes',
        'theme' => 'tvs',
        'cssFile' => array('dialog.css')
    );




}