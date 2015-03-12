<?php
/* @var $this ActorController */
/* @var $dataProvider CActiveDataProvider */
?>


<h1>Актеры</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
