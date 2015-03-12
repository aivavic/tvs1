<?php $this->description = $model->description; ?>


    <div class="info" xmlns="http://www.w3.org/1999/html">

        <div class="overlay">
            <?php echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $model->image, '', array(
                    'class' => 'tvs-image',
                )
            ); ?>
            <h3><?= $model->name; ?></h3>
            <span><?= $model->Country; ?></span>
        </div>
        <div class="box-right">

            <div class="rating">
                <?php $this->widget('CStarRating', array(
                    'name' => 'rating-' . $model->id,
                    'starCount' => '5',
                    'value' => round($model->imdbRating, 0),
                    "readOnly" => true,
                    'htmlOptions' => array('class' => 'rating-block'),
                )); ?>
                <h5 class="bold">IMDb <span><?php echo CHtml::encode($model->imdbRating); ?></span></h5>
            </div>
            <h3>О сериале</h3>

            <p><?= $model->description; ?></p>
            <br/>
            <b><?php echo CHtml::encode($model->getAttributeLabel('Date')); ?>:</b>
            <?php echo CHtml::encode($model->Date); ?>
            <br/>

        </div>
    </div>


<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $tabs,
    'options' => array(
        'collapsible' => true,
    ),
    'id' => 'MyTab-Menu',
));
?>
<?php $this->widget('ext.Carousel.Carousel', [
    'id_series' => $model->id,
    'data' => $actor,
    'title' => 'Актеры',
    'options' => [

        'navText' => [
            '&#x27;пред&#x27;',
            '&#x27;след&#x27;'],

    ],

]); ?>