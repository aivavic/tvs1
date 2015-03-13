<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.02.2015
 * Time: 12:28
 */
class RandomSeries extends CWidget
{

    public $model;
    public $model_rand;

    public $genre;

    public $title = "Случайные сериалы";

    public function run()
    {
        $this->model = Tvseries::model()->recently()->findAll();
        $this->genre = Tvseries::model()->with('genre')->findAll();



        $this->render('randomseries', array(
            'tvseries' => $this->model,
            'genre' => $this->genre,
        ));
    }




}