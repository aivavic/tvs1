<?php
/* @var $this ActorController */
/* @var $model Actor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'actor-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="field">
		<?php if(!$model->isNewRecord) {
			echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $model->image, '', array(
				'class' => 'actor-photo',
				'width' => '120px',));;
		}
		?>
		<?php echo $form->labelEx($model,'image')  . '</br>'; ?>
		<?php echo $form->fileField($model, 'image')  . '</br>'; ?>
		<?php echo $form->error($model,'image')  . '</br>'; ?>
	</div>
	<div class="field">
		<?php echo $form->labelEx($model,'firstname') . '</br>'; ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
		<?php echo $form->error($model,'firstname')  . '</br>'; ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'lastname')  . '</br>'; ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
		<?php echo $form->error($model,'lastname')  . '</br>'; ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'datebirth')  . '</br>'; ?>
		<?php echo $form->dateField($model,'datebirth')  . '</br>'; ?>
		<?php echo $form->error($model,'datebirth')  . '</br>'; ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'placebirth')  . '</br>'; ?>
		<?php echo $form->textField($model,'placebirth',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
		<?php echo $form->error($model,'placebirth')  . '</br>'; ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'activities')  . '</br>'; ?>
		<?php echo $form->textField($model,'activities',array('size'=>60,'maxlength'=>255))  . '</br>'; ?>
		<?php echo $form->error($model,'activities')  . '</br>'; ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'achievements')  . '</br>'; ?>
		<?php
		$this->widget('ext.TvsWidgets.TheCKEditorWidget',array(
			'model'=>$model,
			'attribute'=>'achievements',
			'height'=>'150px',
			'width'=>'100%',
			'toolbarSet'=>array(
			array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
			array( 'TextColor', 'BGColor' ),
		),
			'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
			'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
		) );
		?>
		<?php echo $form->error($model,'achievements')  . '</br>'; ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'biography')  . '</br>'; ?>
		<?php
		$this->widget('ext.TvsWidgets.TheCKEditorWidget',array(
			'model'=>$model,
			'attribute'=>'biography',
			'height'=>'200px',
			'width'=>'100%',
			'toolbarSet'=>'Full',
			'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
			'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
		) );
		?>
		<?php echo $form->error($model,'biography')  . '</br>'; ?>
	</div>



	<div class="field buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->