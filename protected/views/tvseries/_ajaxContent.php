<?php for($i = 1; $i <= $number; $i++): ?>
<div class="season">
    <?php echo "Season - ".$i; ?>
</div>
<?php endfor; ?>

<style>
    .season{
        width: 100%;
        min-height:150px;
        background-color: #d8ffd0;
    }
</style>