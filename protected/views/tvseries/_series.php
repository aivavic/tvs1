<?php


for($i=0; $i<count($data); $i++) {
    echo '<div class="row" style="margin-bottom: 20px">';

    echo CHtml::link("Серия - " . $data[$i]->name, array('/Series/view/'.$data[$i]->id));


    echo "</div>";
}