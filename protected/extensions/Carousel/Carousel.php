<?php


class Carousel extends CWidget
{

    /**
     * DataProvider passed by user.
     *
     * @array CDataProvider
     **/
    public $dataProvider = null;

    public $data = null;

    public $title = '';
    /**
     * Available galleria options.
     * Loaded form galleria/galleria.availableOptions.php
     *
     * @var array
     **/
    private $availableOptions = array();

    /**
     * Widget options overwrite default available options
     * Details: http://galleria.io/docs/options/
     * @var array
     */
    public $options = array('navText' => [
        'пред',
        'след'],);

    public $id_series;
    /**
     * @var array default options
     */
    public static $defaultOptions = [
        'items' => 4,
        'debug' => YII_DEBUG,
        'loop' => 3,
        'margin' => 10,
        'nav' => true,
        'navText' => [
            '',
            ''],
    ];


    /**
     * Binding between model passed in dataProvider
     * This can be defined with behaviors() or in
     * the initialization of this widget.
     *
     * @var array
     **/
    public $binding = null;

    /**
     * Widget optional Prefix
     * Example: imagePrefix{$imagePrefixSeparator}image
     * @var string
     */
    public $imagePrefixSeparator = '';

    /**
     * Widget optional src "path" for image
     * @var string
     */
    public $srcPrefix = '';

    /**
     * Widget optional src "path" for thumb
     * @var string
     */
    public $srcPrefixThumb = '';

    /**
     * Widget overwrite classic theme if specified
     * Galleria themes: http://galleria.io/themes/
     * @var string
     */
    public $themeName = 'default';

    /**
     * Widget overwrite plugins if specified
     * Galleria plugins: http://galleria.io/docs/#plugins
     * @var array
     */
    public $plugins = ['history'];

    public $assets;


    public function init()
    {
        $this->initCarousel();
        $this->assets = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets');
        echo "<h4 class='carousel-caption-h4'>" . $this->title . '</h4>';
        echo "<div id='carousel_" . $this->id . "' class='owl-carousel' >";


    }

    public function run()
    {
        /** @var $cs CClientScript */
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');

        //load theme CSS
        $cs->registerCssFile($this->assets . '/themes/' . $this->themeName . '/owl.carousel.' . $this->themeName . '.css');

        $ext = '.js';

        //$cs->registerScriptFile($this->assets . '/galleria' . $ext);
        $cs->registerScriptFile($this->assets . '/themes/' . $this->themeName . '/owl.carousel.' . $this->themeName . $ext);

        /** load plugins */
        //jQuery(".owl-carousel").owlCarousel({
        $carouselScript = 'jQuery(".owl-carousel").owlCarousel(' . CJSON::encode(array_merge(self::$defaultOptions, $this->options)) . ');';

        $cs->registerScript("carousel_script_" . $this->id, $carouselScript);


        $criteria = new CDbCriteria();
        $criteria->addCondition("id_series = :id_series");


        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_series = $this->id_series";
        $role = ActorTvseries::model()->findAll($Criteria);


        if ($this->data) {
            $this->render(
                'carousel', [
                    'data' => $this->data,
                    'role' => $role

                ]
            );
        }
        echo '</div>';
    }


    private function initCarousel()
    {
        $this->availableOptions = require(dirname(__FILE__) . DIRECTORY_SEPARATOR . "carousel.availableOptions.php");
        $initialize = array();
        if (is_array($this->options)) {
            foreach ($this->options as $option => $value) {
                if (in_array($option, $this->availableOptions)) {
                    $initialize[$option] = $value;
                }
            }
        }

        $this->options = $initialize;
    }

}