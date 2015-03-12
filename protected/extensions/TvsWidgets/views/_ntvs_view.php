<div class="newtvseries-item">

    <a href="#"><?php echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $data->image, '', array(
            'class' => 'tvs-list-image',
            'width' => '245px',
            'min-height' => '373px',
        )); ?></a>

    <div class="box">
        <h3><?php echo $data->name; ?></h3>
        <h5><?php echo $data->description; ?></h5>
        <time datetime="<?php echo CHtml::encode($data->Date); ?>"><?php echo CHtml::encode($data->Date); ?></time>

        <ul class="genre">
            <?php echo CHtml::label('Жанр: '); ?>
            <?php foreach ($data->genre as $genre): ?>
                <li style="display: inline-block">
                    <?php echo CHtml::encode($genre['name_genre']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>