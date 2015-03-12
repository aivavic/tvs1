<?php
/* @var $this ActorController */
/* @var $model Actor */


?>

<h1>View Actor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'firstname',
		'lastname',
		'datebirth',
		'placebirth',
		'activities',
		'achievements',
		'biography',
		'image',
	),
)); ?>
