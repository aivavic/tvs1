<div class="last-images">
    <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/upload/' . $data->image, $data->name, [
        'class' => 'last-series-image',
    ]), ['tvseries/detail/name/' . $data->name]) ?>


    <div class="list-box-hover">
        <span class="name">Молодежка</span>
        <h4>21 серия</h4>
    </div>
</div>