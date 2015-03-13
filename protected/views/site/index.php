<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<section id="content">
    <div class="container">
        <div class="row">
            <article class="col-lg-9 col-md-9 col-sm-9">

                <?php $this->widget('ext.TvsWidgets.RandomSeries', array(
                    'title' => 'Случайные сериалы',
                ));
                ?>


                <?php $this->widget('ext.TvsWidgets.LastSeries.LastSeries', array(
                    'title' => 'Последние серии',
                ));
                ?>


            </article>
            <aside id="accordion" class="col-lg-3 col-md-3 col-sm-3">
                <h4>ТОП-25 сериалов</h4>
                <?php $this->widget('ext.TvsWidgets.RatingSideBar', array()); ?>

            </aside>
        </div>
    </div>

</section>


