<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.02.2015
 * Time: 23:40
 */

class SettingController extends Controller   {
    public $layout='//layouts/column2';
    public $description = 'Tvseries';
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index'),
                'roles'=>array('2'),
            ),

        );
    }

    public function actionIndex()
    {


        $model=Setting::model()->findByPk('1');
        if(isset($_POST['Setting'])){
            $model->attributes=$_POST['Setting'];

            if($model->save()){
                Yii::app()->user->setFlash('setting', 'Настройки сохранены.');
            }

        }

        $this->render('index', array(
            'model'=>$model
        ));

    }

}