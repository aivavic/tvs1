<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.03.2015
 * Time: 10:17
 */
Yii::import('zii.widgets.CPortlet');
class AdminMenu extends CPortlet{

    public function init()
    {
        $this->title = CHtml::encode(Yii::app()->user->name);
        parent::init();
    }

    protected function renderContent()
    {
        $this->render('adminMenu');
    }
}