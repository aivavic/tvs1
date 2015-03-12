<?php
/* @var $this TvseriesController */
/* @var $model Tvseries */

//$this->breadcrumbs=array(
//	'Tvseries'=>array('index'),
//	'Create',
//);

$this->menu=array(
	array('label'=>'List Tvseries', 'url'=>array('index')),
	array('label'=>'Manage Tvseries', 'url'=>array('admin')),
);
?>

<h1>Create Tvseries</h1>
<div class="view">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
