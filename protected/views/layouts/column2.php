<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <section id="content">
        <div class="container">
            <div class="row">
                <article class="col-lg-9 col-md9 col-sd-9"><?php echo $content; ?></article>
                <aside class="col-lg-3 col-md-3 col-sm-3">
                    <?php
                    if (Yii::app()->user->checkAccess('2')) {
                        $this->widget('AdminMenu');
                    } else {
                        echo '<h4>ТОП-25 сериалов</h4>';
                        $this->widget('ext.TvsWidgets.RatingSideBar', array());
                    }
                    ?>
                </aside>
            </div>
        </div>
    </section>
<?php $this->endContent(); ?>