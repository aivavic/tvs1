<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <section id="content">
        <div class="container">
            <div class="row">
                <article class="col-lg-9 col-md9 col-sd-9"><?php echo $content; ?></article>
                <aside class="col-lg-3 col-md-3 col-sm-3">


                    <?php $this->widget('ext.TvsWidgets.RatingSideBar', array(
                    ));
                    ?>
                    <?php
                    $this->beginWidget('zii.widgets.CPortlet', array(
                        'title'=>'Operations',
                    ));
                    $this->widget('zii.widgets.CMenu', array(
                        'items'=>$this->menu,
                        'htmlOptions'=>array('class'=>'operations'),
                    ));
                    $this->endWidget();
                    ?></aside>
            </div>
        </div>
    </section>



<?php $this->endContent(); ?>