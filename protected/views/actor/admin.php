<?php
/* @var $this ActorController */
/* @var $model Actor */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#actor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление актерами</h1>


<?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->
<?php
if (Yii::app()->user->checkAccess('2')) {
    echo '</br>' . CHtml::link('Добавить актера', array('Actor/Create'));
    echo '</br>' . CHtml::link('Список ', array('Actor/index'));
}
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'actor-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'firstname',
        'lastname',
        'datebirth',
        'placebirth',
        'activities',
        /*
        'achievements',
        'biography',
        'image',
        */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
