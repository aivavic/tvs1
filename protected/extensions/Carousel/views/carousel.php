
<?php

foreach($data as $k => $v): ?>
    <?php foreach($role as $key => $value){
        if($value['id_actor'] == $v['id']){
            $role_ = $value['role'];
        }
    } ?>

    <div class="item"><img src="/upload/<?php  echo $v['image'] ?>" alt="Owl Image">
    <h5><?php echo CHtml::link($v['firstname'] .' ' . $v['lastname'] . '</br>Роль - ' . $role_, ['/actor/view/'.$v['id']]); ?></h5>
    </div>



<?php endforeach; ?>



