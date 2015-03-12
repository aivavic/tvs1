<div class="favorites">
    <h5 class="alert-success">

        <?php echo Yii::app()->user->getFlash('drop_subscribes'); ?>
    </h5>
    <?php if(count($subscribes) == 0): ?>
        <h5 class="alert-success">
            В этот раздел не добавлено ни одного сериала
        </h5>

    <?php endif;

    for($j = 0; $j < count($subscribes); $j++): $data = $subscribes[$j]; $phone = $phones[$j]; $email = $emails[$j]; ?>
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
                <h5><span>В ролях:</span> Ману Беннетт, Люси Лоулесс, Энди Уитфилд, Джон Ханна, Питер Менса, Ник Тарабэй, Вива
                    Бьянка, Лесли-Энн Брандт, Джей Кортни, Крэйг Паркер</h5>

                <?php
                $phoneCheck = false;
                $emailCheck = false;
                if($phone == 1 && ($email == 0)){
                    $subs_method = "sms";
                    $phoneCheck = true;
                    $emailCheck = false;
                }
                if($email == 1 && $phone == 0){
                    $subs_method = "email";
                    $phoneCheck = false;
                    $emailCheck = true;
                }
                if(($phone == 1) && ($email == 1)){
                    $subs_method = "sms, email";
                    $phoneCheck = true;
                    $emailCheck = true;
                }
                echo CHtml::label('Способ подписки: ' . $subs_method);



                $this->beginWidget('ext.OverloaderWidgets.SubscribeDialog', array(
                    'id' => 'dialog-animation' . $data->id,
                    'options' => array(
                        'autoOpen' => false
                    ),
                ));



                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'drop_subscribes-form',
                        'enableAjaxValidation' => false,
                    ));
                    echo CHtml::CheckBox('phone', $phoneCheck ,array('name'=>'phone'));
                    echo CHtml::label('По телефону'). '  ';
                    echo CHtml::CheckBox('email', $emailCheck, array('name'=>'email'));
                    echo CHtml::label('По email'). '</br>';
                    echo CHtml::submitButton('Применить', array('name' => 'favorites', 'class'=>'btn btn-primary'));
                    echo CHtml::hiddenField('drop_subscribes', $data->id, array('id' => 'hiddenInput'));
                    $this->endWidget();
                $this->endWidget('ext.OverloaderWidgets.SubscribeDialog');
                /** End Widget **/


                echo CHtml::button('Изменить способ подписки', array(
                    'onclick' => "$('#dialog-animation$data->id').dialog('open'); return false;",
                    'class'=>'btn btn-primary'
                )); ?>
            </div>

        </div>
    <?php endfor; ?>

</div>