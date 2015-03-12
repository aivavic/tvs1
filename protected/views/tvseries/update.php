<?php
/* @var $this TvseriesController */
/* @var $model Tvseries */
?>


<h1>Update Tvseries <?php echo $model->id; ?></h1>
<div class="view">
    <?php $this->renderPartial('_form', [
        'model' => $model,
        'model_series' => $model_series
    ]); ?>
</div>
