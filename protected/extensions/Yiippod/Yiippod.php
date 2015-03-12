<?php

/*
 * @author -\- автор  Alexander Shapovalov <mail@shapovalov.org>
 * 
 * usage -\- использование
<?php  
 
$this->widget('ext.Yiippod.Yiippod', array(
'video'=>"http://www.youtube.com/watch?v=qD2olIdUGd8", //or comment this string if you use playlist
'id' => 'yiippodplayer',
'width'=>640,
'height'=>480,
'autoplay'=>true,
'bgcolor'=>'#000'
'view'=>6,
));

?>
 */

class Yiippod extends CWidget
{
    /** The uppod.swf url -\- Ссылка на .swf файл uppod'а
     * @var string
     */
    public $swfUrl;
    /** The media file or stream video URL -\- Адрес медиа файла или потока (RTMP, mov, mp4, flv, avi)
     * The media file must be a string -\- Адрес к файлу\потоку должен иметь строковой тип данных
     *
     * @var string
     */
    public $video;
    /** Player width -\- Ширина плеера
     * @var integer
     */
    public $width;
    /** Player height. -\- Высота плеера
     * @var integer
     */
    public $height;
    /** Player background color -\- Цвет заднего фона плеера
     * @var string
     */
    public $bgcolor;
    /** Player view - style (1-6). -\- Стиль плеера от 1 до 6
     * @var integer
     */
    public $view;
    /** Player id. -\- Идентификатор ИД плеера
     * @var string
     */
    public $id;
    /** autopaly  - true \ false
     * @var bool
     */
    public $autoplay;
    /** The js scripts to register  -\- Путь до скрипта uppod'a
     * @var array
     */
    private $js = array(
        'uppod.js'
    );
    /** The asset folder after published  -\- Папка со скриптами после публикации
     * @var string
     */
    private $assets;
    /** The path to playlist
     * @var string
     */
    public $playlist;


    public $inputArray;


    /**
     * Register the core uppod js lib -\- Регистрация скрипта плеера библиотека js
     *
     */
    private function registerScripts()
    {
        $url = "/protected/extensions/Yiippod/assets";

        Yii::app()->clientScript->registerScriptFile($url . '/swfobject.js');
        Yii::app()->clientScript->registerScriptFile($url . '/uppod.js');

    }

    /**
     * Initialize the widget and necessary properties -\- Инициализация виджета и необходимых свойств
     *
     */
    private function playlistCreator()
    {
        function object_to_array($data)
        {
            if (is_array($data) || is_object($data)) {
                $result = array();
                foreach ($data as $key => $value) {
                    $result[$key] = object_to_array($value);
                }
                return $result;
            }
            return $data;
        }

        $test01 = object_to_array($this->inputArray);

        $mot03 = 0;
        $k2 = -1;
        foreach ($test01 as $k => $v) {
            $k1 = $v['id_season'];

            if($k2 == -1)$k2=$v['id_season'];

            if($k2!=$k1){
                $k2 = $k1;
                $mot03 = 0;
            }
            $new01['playlist'][$k1]['comment'] = 'Season'.$k1;
            $new01['playlist'][$k1]['playlist'][$mot03]['comment'] = 'Series' .$v['name'];
            $new01['playlist'][$k1]['playlist'][$mot03]['file'] = $v['url'];

            $mot03++;
        }

        $mot01 = 0;
        foreach ($new01['playlist'] as $k => $v) {
            $new02[$mot01] = $v;
            $mot01++;
        }
        $new01['playlist'] = $new02;
        $json = json_encode($new01);
        $result = str_replace('\/', '/', $json);

        return $result;
    }

    public function init()
    {
        $this->assets = "/protected/extensions/Yiippod/assets";
        $this->registerScripts();
        $this->playlist = $this->playlistCreator();
        if (!isset($this->width)) $this->width = 320;
        if (!isset($this->height)) $this->height = 240;
        if (!isset($this->bgcolor)) $this->bgcolor = '#FFF';
        if (!isset($this->id)) $this->id = 'yiippodplayer';
        if (!isset($this->autoplay)) $this->autoplay = false;
        if (empty($this->view)) $this->view = 6;
        if (!isset($this->swfUrl)) $this->swfUrl = $this->assets . "/uppod.swf";
    }

    /**
     * Render uppod player -\- Отображение плеера
     *
     */
    public function run()
    {
        $this->render('yiippod');
    }
}