<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.02.2015
 * Time: 16:19
 */

class LastSeries extends CWidget{
    public $title = "Случайные сериалы";
    public $model;

    public function run()
    {
        $this->get_data();

        $this->render('lastseries', [
           'model' => $this->model,
        ]);
    }
    private function get_id(){
        $criteria = null;
        $criteria=new CDbCriteria;
        $criteria->select='id_tvseries';  // выбираем только поле 'title'
        $criteria->distinct = true;
        $series = Series::model()->lastseries()->findAll($criteria);
        foreach($series as $key => $value){
            $id_tvseries[] = ($value['id_tvseries']);
        }
        return $id_tvseries;
    }

    private function get_data()
    {
        $criteria = null;
        $criteria = new CDbCriteria();
        $criteria->addInCondition("id", $this->get_id());
        $model = Tvseries::model()->findAll($criteria);
        $this->model = $model;
    }

}