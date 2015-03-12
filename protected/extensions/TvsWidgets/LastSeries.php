<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.02.2015
 * Time: 16:19
 */

class LastSeries extends CWidget{
    public $title = "Случайные сериалы";

    public function run()
    {
        $model = Tvseries::model()->findAll();
        $genre = Tvseries::model()->with('genre')->findAll();

        $this->render('lastseries', array(
            'tvseries' => $model,
            'genre' => $genre,

        ));
    }
}