<?php

class RatingSideBar extends CWidget
{


    public function run()
    {

        $tvseries = Tvseries::model()->findAll(array(
            'select'=>'*',
            'order'=> 'imdbRating DESC',
            'limit'=>25
        ));
        $this->render('ratingsidebar', array(
'tvseries' => $tvseries,

    ));
    }


}