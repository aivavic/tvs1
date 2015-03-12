<?php
/* @var $this MetatagsController */
/* @var $model Metatags */

$this->breadcrumbs=array(
	'Metatags'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Metatags', 'url'=>array('index')),
	array('label'=>'Create Metatags', 'url'=>array('create')),
	array('label'=>'Update Metatags', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Metatags', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Metatags', 'url'=>array('admin')),
);
?>

<h1>View Metatags #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'content',
	),
)); ?>
