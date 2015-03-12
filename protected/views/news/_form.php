<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->labelEx($model,'title') . '</br>'; ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128), array('class'=>'form-control')). '</br>'; ?>
		<?php echo $form->error($model,'title'); ?>


	<?php
	$this->widget('ext.TvsWidgets.TheCKEditorWidget',array(

	//Модель с которой будет связан виджет
	'model'=>$model,

	//Атрибут поля
	'attribute'=>'content',
	'height'=>'300px',
	'width'=>'100%',

	//набор кнопок редактора (Basic,Standart или Full)
		'toolbarSet'=>'Full',
//		'toolbarSet'=>array(
//			array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
//			array( 'TextColor', 'BGColor' ),
//		),

	//Путь к файлу ckeditor.php
	'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',

	//Путь к редактору
	'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
	) );
	?>


		<?php echo CHtml::submitButton($model->isNewRecord ? 'Опубликовать' : 'Сохранить', array(

				'class' => 'btn btn-primary',

		)); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->