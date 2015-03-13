

    <?php
    foreach ($model as $key => $value):
        $this->render('_ltvs_view', ['data'=>$value]);
    endforeach;


    ?>
