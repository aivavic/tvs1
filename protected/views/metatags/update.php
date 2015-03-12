<?php
/* @var $this MetatagsController */
/* @var $model Metatags */

$this->breadcrumbs=array(
	'Metatags'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Metatags', 'url'=>array('index')),
	array('label'=>'Create Metatags', 'url'=>array('create')),
	array('label'=>'View Metatags', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Metatags', 'url'=>array('admin')),
);
?>

<h1>Update Metatags <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>