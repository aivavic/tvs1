<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat|Sail|Concert+One' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/sass/sass/screen.css"
          media="screen, projection"/>



    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<header id="header">
    <hr/>
    <div class="container">
        <div class="row">
            <!--<h1 id="headline">Series</h1>-->
            <a id='logo' href="<?php echo Yii::app()->request->baseUrl; ?>/"><img
                    src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_new.png" alt=""/></a>

            <div id="mainmenu">
                <?php $this->widget('zii.widgets.CMenu', array(
                    'items' => array(

                        array('label' => 'Сериалы', 'url' => array('/tvseries/index'), 'itemOptions' => array('class' => 'mainmenu__serials')),
                        array('label' => 'Новые', 'url' => array('/tvseries/newTvSeries'), 'itemOptions' => array('class' => 'mainmenu__new')),
                        array('label' => 'Новости', 'url' => array('/news/index'), 'itemOptions' => array('class' => 'mainmenu__news')),
                        array('label' => 'Актеры', 'url' => array('/actor/index'), 'itemOptions' => array('class' => 'mainmenu__actors')),
                        array('label' => 'Форум', 'url' => array('/forum'), 'itemOptions' => array('class' => 'mainmenu__forum'))


                    ),
                )); ?>
            </div>
            <!-- mainmenu -->

            <div class="user round-56">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Вход', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest , 'itemOptions' => array('class' => 'uppercase mainmenu__h5')),
                        array('label' => Yii::app()->user->name, 'url' => array('/user/personal'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ));
                ?>
                <!--					<h5 class="uppercase">Admin</h5>-->
            </div>
        </div>
        <div class="row">
            <div class="toppanel">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <h3 class="uppercase">любимые сериалы всегда рядом с вами</h3>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="search">
                        <form action="#" method="post">
                            <input type="text"/>
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <select name="search" id="searchselect">
                                <option value="serials">по сериалам</option>
                                <option value="actors">по актерам</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header -->
<div class="container" id="page">

    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>
</div>
<!-- page -->




<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="logo col-lg-3">
                <h1>TV Series</h1>
                <h4>Любимые сериалы всегда рядом</h4>
            </div>
            <div class="col-lg-7">
                <p>Приветствуйте новый дайджест по вашим любимым сериалам! Мы расскажем о самых важных новостях в мире
                    сериалов! Не забываем о розыгрыше: каждый поделившийся видео Вконтакте получит неделю премиума на
                    сайте!</p>

                <p>У нас вы можете посмотреть сериалы онлайн в любое время, которое удобно для вас! Сериалы детективного
                    жанра, комедии, мультипликационные и документальные сериалы и еще много других жанров вы легко
                    найдете в нашем онлайн кинотеатре. Видеотека сайта постоянно пополняется, мы предлагаем для
                    просмотра как новые только, что вышедшие в прокат сериалы, так и те, которые уже покорили сердца
                    зрителей.</p>
            </div>
            <div class="col-lg-2">
                <h4>Мы в соцсетях</h4>

                <div class="social">
                    <a class='fa-facebook' href="#"></a>
                    <a class="fa-google-plus" href="#"></a>
                    <a href="#">VK</a>
                    <a class="fa-twitter" href="#"></a>
                    <a class="fa-youtube" href="#"></a>
                    <a href="#">OK</a>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright">
        Copyright &copy; <?php echo date('Y'); ?> by Viktor Afanasjev.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div>
    <!-- footer -->
</footer>


</body>
</html>
