<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.02.2015
 * Time: 16:40
 */
class newTvSeries extends CWidget
{

    public function run()
    {


        $tvseries = Tvseries::model()->findAll(array(
            'select' => '*',
            'order' => 'Date DESC',
        ));


        $dataProvider = new CActiveDataProvider('Tvseries', array(
            'pagination' => array(
                'pageSize' => 5,
                'pageVar' => 'page',
            ),
            'sort' => array(
                'defaultOrder' => array(
                    'Date' => CSort::SORT_DESC,
                )
            ),
        ));


        $this->render('newtvseries', array(
            'model' => $tvseries,
            'dataProvider' => $dataProvider,
        ));
    }

}