<?php
/* @var $this ActorController */
/* @var $model Actor */
?>

<div class="view">
<h1>Update Actor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>