<!--<div class="tvs-list-head-panel">-->
<!--    <span>Сортировать по: </span>-->
<!--    <ul>-->
<!--        <li><a class="fa-caret-down" href="#">алфавиту</a></li>-->
<!--        <li><a class="fa-caret-down" href="#">году</a></li>-->
<!--        <li><a class="fa-caret-down" href="#">рейтингу</a></li>-->
<!--    </ul>-->
<!--   -->
<!--</div>-->
<?php
/* @var $this TvseriesController */
/* @var $dataProvider CActiveDataProvider */
$this->menu = array(
    array('label' => 'Create Tvseries', 'url' => array('create')),
    array('label' => 'Manage Tvseries', 'url' => array('admin')),
);
?>

<div class="serials-container-list">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'ajaxUpdate'=>true,
        'afterAjaxUpdate'=>"function() {
        jQuery('.rating-block input').rating({'readOnly':true});
    }",

        'sorterCssClass'=>'tvs-list-head-panel',
        'sorterHeader'=>'Сортировать по ',
        'sortableAttributes'=>array(
            'name',
            'Date',
            'imdbRating',

        ),
    )); ?>
</div>