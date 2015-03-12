<?php
/* @var $this NewsController */
/* @var $model News */

//$this->menu=array(
//	array('label'=>'List News', 'url'=>array('index')),
//	array('label'=>'Create News', 'url'=>array('create')),
//	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage News', 'url'=>array('admin')),
//);
?>
<div class="view">
<h1>Редактирование записи: <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>