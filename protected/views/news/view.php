
<?php
/* @var $this NewsController */
/* @var $model News */


?>
<div class="view">
	<h1><?php echo $model->title; ?></h1>

	<?php echo $model->content; ?>
	<br />

	<time datetime="<?php echo CHtml::encode($model->datestamp); ?>">
		<b><?php echo CHtml::encode($model->getAttributeLabel('datestamp')); ?>:</b>
		<?php echo CHtml::encode($model->datestamp); ?>
	</time>
	<br />
</div>