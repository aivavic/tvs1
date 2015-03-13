
<div class="last-series">
    <h4><?php echo $this->title; ?></h4>
    <div class="list-box">
        <?php
        $this->render('_viewlist',[
                'model' => $model,

            ]
        );
        ?>
    </div>

    <div class="carousel">
        <?php
        $this->render('_carousel',[
                'model' => $model,
            ]
        );
        ?>
    </div>
</div>