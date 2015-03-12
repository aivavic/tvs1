<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */
//$this->menu=array(
//	array('label'=>'Create News', 'url'=>array('create')),
//	array('label'=>'Manage News', 'url'=>array('admin')),
//);
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
