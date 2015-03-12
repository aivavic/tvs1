<?php
/* @var $this MetatagsController */
/* @var $model Metatags */

$this->breadcrumbs=array(
	'Metatags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Metatags', 'url'=>array('index')),
	array('label'=>'Manage Metatags', 'url'=>array('admin')),
);
?>

<h1>Create Metatags</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>