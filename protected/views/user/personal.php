<?php
$username = Yii::app()->user->name;
$user = User::model()->find('username=:username', array(':username' => $username));


echo CHtml::link('Выход', array('site/logout'));

?>
    <h5 class="alert-success">
        <?php echo Yii::app()->user->getFlash('drop_favorites'); ?>

    </h5>
    <div class="info">
        <?php echo CHtml::image(Yii::app()->baseUrl . '/upload/userPhoto' . $user->avatar, '', array(
                'class' => 'avatar',
            )
        ); ?>
        <div class="box_right">
            <b><?php echo CHtml::encode($user->getAttributeLabel('username')); ?>:</b>
            <?php echo CHtml::encode($user->username); ?>
            <br/>
            <b><?php echo CHtml::encode($user->getAttributeLabel('email')); ?>:</b>
            <?php echo CHtml::encode($user->email); ?>
            <br/>
            <b><?php echo CHtml::encode($user->getAttributeLabel('created')); ?>:</b>
            <?php echo CHtml::encode($user->created); ?>
            <br/>
            <b><?php echo CHtml::encode($user->getAttributeLabel('gender')); ?>:</b>
            <?php echo CHtml::encode($user->gender); ?>
            <br/>
            <b><?php echo CHtml::encode($user->getAttributeLabel('dob')); ?>:</b>
            <?php echo CHtml::encode($user->dob); ?>
            <br/>

        </div>

    </div>
<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => array(

        'Профиль'=>array('id'=>'profile','content'=>$this->renderPartial(
            '_profile',
            array('user'=>$user),TRUE
        )),
        'Мои сериалы'=>array('id'=>'myTvseries','content'=>$this->renderPartial(
            '_myTvseries',
            array('Values'=>'myTvseries',
                'user_id'=>$user_id,
                'favorites'=>$favorites,
                ),TRUE
        )),
        'Календарь'=>array('id'=>'calendar','content'=>$this->renderPartial(
            '_calendar',
            array('Values'=>'Календарь'),TRUE
        )),
        'Подписки'=>array('id'=>'subscribes','content'=>$this->renderPartial(
            '_subscribes',
            array(
                'subscribes'=>$subscribes,
                'phones' => $phone,
                'emails' => $email,
                ),TRUE
        )),

    ),
    'options' => array(
        'collapsible' => true,
    ),
    'id' => 'personal_page',
));