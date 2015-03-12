<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">


	<h3><?php echo CHtml::encode($data->title); ?></h3>
	<br />


<?php  $this->widget('ext.Readmore.XReadMore', array(
  'showLink'=>true,
  'model'=>$data,
  'attribute'=>'content',
  'maxChar'=>100,
	'linkText'=>'Читать дальше ...'
  ));
?>
<?php if(Yii::app()->user->role == 2):?>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/edit.gif"), array('update', 'id'=>$data->id));?>
<?php endif; ?>
	<time datetime="<?php echo CHtml::encode($data->datestamp); ?>">
		<b><?php echo CHtml::encode($data->getAttributeLabel('datestamp')); ?>:</b>
		<?php echo CHtml::encode($data->datestamp); ?>
	</time>
</div>