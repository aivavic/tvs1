<?php
/* @var $this SeriesController */
/* @var $model Series */

$this->breadcrumbs=array(
	'Series'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Series', 'url'=>array('index')),
	array('label'=>'Manage Series', 'url'=>array('admin')),
);
?>

<h1>Create Series</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>