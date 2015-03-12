<?php
/* @var $this MetatagsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Metatags',
);

$this->menu=array(
	array('label'=>'Create Metatags', 'url'=>array('create')),
	array('label'=>'Manage Metatags', 'url'=>array('admin')),
);
?>

<h1>Metatags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
