<?php
class LangChoserWidget extends CWidget
{
    /**
     * @var string locale
     */
     public $lang1='';
    /**
     * startt widget
     */
    public function run(){
    $this->render('index', array(
        'lang1' => $this->lang1,
    ));
    }

}