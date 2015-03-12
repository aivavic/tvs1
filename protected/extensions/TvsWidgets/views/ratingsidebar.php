<?php
for ($i = 0; $i < count($tvseries); $i++) {
    $pane[$i] = "<span class='ratting'>" . $tvseries[$i]['imdbRating'] . "</span>" .$tvseries[$i]['name'] . " (" . $tvseries[$i]['Country'] . ")";
    $content[$i]= CHtml::link( CHtml::image( Yii::app()->request->baseUrl . "/upload/" . CHtml::encode($tvseries[$i]['image']), '', array('class' => 'tvs-list-image','width' => '245px','min-height' => '373px',)), array('tvseries/detail','name' => $tvseries[$i]['name']));
    $panels[$pane[$i]] =  $content[$i];
}
$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels' => $panels,
    'options' => array(
        'collapsible' => true,
        'autoHeight' => false,
        'active' => false,
        'icons' => false,
        'ajaxUpdate'=>false,

    ),
    'themeUrl'=>'/css/themes',
    'theme'=>'tvs',
    'cssFile'=>'juiAccordion.css'
));
?>