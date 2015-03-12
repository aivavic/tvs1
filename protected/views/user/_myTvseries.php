<div class="favorites">
    <?php if (count($favorites) == 0): ?>
        <h5 class="alert-success">
            В этот раздел не добавлено ни одного сериала
        </h5>
    <?php endif;
    for ($j = 0; $j < count($favorites); $j++): $data = $favorites[$j]; ?>
        <div class="tvs-list-item">

            <?php echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $data->image, '', array(
                'class' => 'tvs-list-image',
                'width' => '155px',
            )); ?>

            <div class="box">
                <div class="rating">
                    <?php $this->widget('CStarRating', array(
                        'name' => 'rating-' . $data->id,
                        'starCount' => '5',
                        'value' => round($data->imdbRating, 0),
                        "readOnly" => true,
                        'htmlOptions' => array('class' => 'rating-block'),
                    )); ?>
                    <h5 class="bold">IMDb <span><?php echo CHtml::encode($data->imdbRating); ?></span></h5>
                </div>

                <h3><?php echo CHtml::link(CHtml::encode($data->name), array(
                        'tvseries/detail',
                        'name' => "$data->name")); ?></h3>

                <h5><?php echo CHtml::encode($data->description); ?></h5>

                <h5><span><?php echo CHtml::encode($data->getAttributeLabel('Date')); ?>
                        :</span> <?php echo CHtml::encode($data->Date); ?> </h5>

                <h5><span><?php echo CHtml::encode($data->getAttributeLabel('Country')); ?>
                        : </span> <?php echo CHtml::encode($data->Country); ?> </h5>

                <?php $genre = Tvseries::model()->with('genre')->findByPk($data->id); ?>

                <h5><span><?php echo($genre->getAttributeLabel('Genre')); ?> : </span>
                    <?php
                    for ($i = 0; $i < count($genre['genre']); $i++) {
                        if (($i + 1) == count($genre['genre'])) {
                            echo $genre['genre'][$i]->name_genre;
                        } else {
                            echo $genre['genre'][$i]->name_genre . ', ';
                        }

                    } ?>
                </h5>
                <h5><span>Продолжительность серии:</span> 00:52:00</h5>
                <h5><span>Режиссер:</span> Майкл Херст, Рик Джейкобсон, Джесси Уарн</h5>
                <h5><span>В ролях:</span> Ману Беннетт, Люси Лоулесс, Энди Уитфилд, Джон Ханна, Питер Менса, Ник
                    Тарабэй, Вива
                    Бьянка, Лесли-Энн Брандт, Джей Кортни, Крэйг Паркер</h5>


                <?php

                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'drop_favorites-form',
                    'enableAjaxValidation' => false,
                ));
                echo CHtml::submitButton('Удалить', array('name' => 'favorites', 'class' => 'btn btn-primary'));
                echo CHtml::hiddenField('drop_favorites', $data->id, array('id' => 'hiddenInput'));
                $this->endWidget();



                ?>
            </div>

        </div>
    <?php endfor; ?>

</div>