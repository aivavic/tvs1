<?php
/* @var $this TvseriesController */
/* @var $model Tvseries */

$this->breadcrumbs=array(
	'Tvseries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tvseries', 'url'=>array('index')),
	array('label'=>'Create Tvseries', 'url'=>array('create')),
	array('label'=>'View Tvseries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tvseries', 'url'=>array('admin')),
);
?>

<h1>Update Tvseries <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>