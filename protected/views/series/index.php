<?php
/* @var $this SeriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Series',
);
if (Yii::app()->user->name == 'admin') {
    $this->menu = array(
        array('label' => 'Create Series', 'url' => array('create')),
        array('label' => 'Manage Series', 'url' => array('admin')),
    );
}
?>

<h1>Series</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
