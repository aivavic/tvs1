
<div class="content-head-panel">
    <h4><?php echo $this->title; ?></h4>
    <h5><a href="<?php echo Yii::app()->createUrl('tvseries/index');?>">все сериалы</a></h5>
    <?php
    //echo "country" .$model->Country;
    ?>
</div>
<hr/>
<div class="serials-container ">


    <?php for($i = 0; $i < count($tvseries); $i++):?>

     <div class="serial-img"><?php echo CHtml::image(Yii::app()->baseUrl . '/upload/' . CHtml::encode($tvseries[$i]['image']), '', array(
                 'class' => 'tvs-list-image',
                 'width' => '245px',
                 'min-height' => '373px',
                 )); ?>

        <div class="serial-hover">

            <h3><?php echo CHtml::link(CHtml::encode($tvseries[$i]['name']) .' (' . CHtml::encode($tvseries[$i]['Country']) . ')', array(
                    'tvseries/detail',
                    'name' => CHtml::encode($tvseries[$i]['name']),)); ?></h3>
            <?php echo CHtml::image(Yii::app()->baseUrl . '/images/clock.png'); ?>
            <h5>1 сезон</h5>
            <h5>12 серий</h5>

            <?php
            $genre = array();
            $genre = Tvseries::model()->with('genre')->findByPk($tvseries[$i]['id']);
           
            ?>

            <ul class="genre">
                <?php for ($j = 0; $j < count($genre['genre']); $j++):?>
                    <li>
                        <a href="#">

                            <?php echo $genre['genre'][$j]->name_genre; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>

            <ul class="stars">
                <?php $this->widget('CStarRating',array(
                    'name'=>'rating-'. CHtml::encode($tvseries[$i]['id']),
                    'starCount'=>'5',
                    'value'=>round(CHtml::encode($tvseries[$i]['imdbRating']) , 0),
                    "readOnly" => true,
                )); ?>
            </ul>
            <h4 class="round-40"><?php echo CHtml::encode($tvseries[$i]['imdbRating']); ?></h4>
        </div>
    </div>
    <?php endfor; ?>



</div>
