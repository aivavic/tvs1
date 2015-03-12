<?php
/* @var $this TvseriesController */
/* @var $model Tvseries */

?>

<h1>View Tvseries #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'Country',
		'image',
		'Date',
		'Genre',
		'imdbRating'
	),
)); ?>
<?php
$this->widget('CTabView', array(
     'tabs'=>array(
         'tab1'=>array(
            'title'=>'tab 1 title',
             'view'=>'_form',
             'data'=>array('model'=>$model),
         ),
         'tab2'=>array(
             'title'=>'tab 2 title',
             'url'=>'http://www.yiiframework.com/',
         ),
		 'tab3'=>array(
			 'title'=>'tab 3 title',
			 'view'=>'detail',
			 'data'=>array('model'=>$model),
		 ),
     ),
 ));
?>