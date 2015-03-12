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


    <!---->
    <!--<script-->
    <!--    src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/protected/extensions/Carousel/assets/theme/default/owl.carousel.default.js"></script>-->
    <!--<link rel="stylesheet"-->
    <!--      href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/protected/extensions/Carousel/assets/theme/default/owl.carousel.default.css"/>-->
    <!--<div id="owl-example" class="owl-carousel">-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--    <div class="item"><img src="/upload/71-logo.jpg" alt="Owl Image"></div>-->
    <!--</div>-->
    <!--<script>-->
    <!--    jQuery(document).ready(function () {-->
    <!--        jQuery(".owl-carousel").owlCarousel({-->
    <!--            items: 5,-->
    <!--            loop: true,-->
    <!--            margin: 10,-->
    <!--            nav: true-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->

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