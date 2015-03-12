



<?php for($i = 0; $i < count($tvseries); $i++): ?>
    <div class="newtvseries-item">
        <a href="#"><?php echo CHtml::image(Yii::app()->baseUrl . '/upload/' . CHtml::encode($tvseries[$i]['image']), '', array(
                'class' => 'tvs-list-image',
                'width' => '245px',
                'min-height' => '373px',
            )); ?></a>
        <div class="box">
        <h3><?php echo $tvseries[$i]['name']; ?></h3>
        <h5><?php echo $tvseries[$i]['description']; ?></h5>
    <?php echo $tvseries[$i]['name']. ' - '. $tvseries[$i]['Date'] . '</br>'; ?>
        </div>
    </div>
<?php endfor; ?>


