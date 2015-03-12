<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.02.2015
 * Time: 12:28
 */
class RandomSeries extends CWidget
{

    public $title = "Случайные сериалы";

    public function run()
    {
        $model = Tvseries::model()->recently()->findAll();
        $genre = Tvseries::model()->with('genre')->findAll();

        $this->render('randomseries', array(
            'tvseries' => $model,
            'genre' => $genre,

        ));
    }


}