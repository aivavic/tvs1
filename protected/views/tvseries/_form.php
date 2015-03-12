<?php
/* @var $this TvseriesController */
/* @var $model Tvseries */
/* @var $form CActiveForm */

?>


<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
<?php if ($model->isNewRecord): ?>
    <h3>Введите ID фильма</h3> <h5>(пример: http://www.imdb.com/title/<u>tt2381941</u>/?ref_=hm_otw_t0)</h5>

    <form action="" method="post">
        <input type="text" name="searchId" class="form-control"/>
        <?php echo CHtml::submitButton('Заполнить поля', array('class' => "btn btn-info")); ?>
    </form>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?
    if ($_POST["searchId"] != '') {
        print_r($_POST["searchId"]);
        $searchId = $_POST["searchId"];
        $parse = file_get_contents('http://omdbapi.com/?i=' . $searchId);
        $parse = json_decode($parse);
        // var_dump($parse);
        function object_to_array($data)
        {
            if (is_array($data) || is_object($data)) {
                $result = array();
                foreach ($data as $key => $value) {
                    $result[$key] = object_to_array($value);
                }
                return $result;
            }
            return $data;
        }

        $parse = object_to_array($parse);
    } else {
        $parse = '';
    }
endif;
?>

<div class="form" xmlns="http://www.w3.org/1999/html">
    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'tvseries-form',

            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
    );
    ?>




    <?php echo $form->errorSummary($model); ?>
    <?php ?>
    <div class="field">
        <?php echo $form->labelEx($model, 'name'); ?><br/>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'value' => $parse['Title'], 'class' => "form-control")); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="field">
        <?php echo $form->labelEx($model, 'description'); ?><br/>
        <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 10000, 'value' => $parse['Plot'], 'class' => "form-control")); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="field">
        <?php echo $form->labelEx($model, 'Country'); ?><br/>
        <?php echo $form->textField($model, 'Country', array('size' => 60, 'maxlength' => 100, 'value' => $parse['Country'], 'class' => "form-control")); ?>
        <?php echo $form->error($model, 'Country'); ?>
    </div>
    <div class="field">
        Постер: <input type="text" value="<?php echo $parse['Poster']; ?>"/>
        <?php
        echo $form->labelEx($model, 'image') . '<br/>';
        echo $form->fileField($model, 'image', array('class' => "form-control"));
        echo $form->error($model, 'image');
        ?>
    </div>
    <?php for ($i = 1900; $i <= date("Y"); $i++) {
        $year[$i] = $i;
    } ?>
    <?php echo CHtml::dropDownList('listname', $select,
        $year) ?>
    <div class="field">
        <?php echo $form->labelEx($model, 'Date'); ?><br/>
        <?php echo $form->textField($model, 'Date', array('size' => 60, 'maxlength' => 100, 'value' => $parse['Year'])); ?>
        <?php echo $form->error($model, 'Date'); ?>
    </div>
    <div class="field">
        <?php echo $form->labelEx($model, 'imdbRating'); ?><br/>
        <?php echo $form->textField($model, 'imdbRating', array('size' => 60, 'maxlength' => 100, 'value' => $parse['imdbRating'])); ?>
        <?php //echo $form->error($model, 'imdbRating'); ?>
    </div>
    <div class="field">
        <?php echo $form->labelEx($model, 'imdbVotes'); ?><br/>
        <?php echo $form->textField($model, 'imdbVotes', array('size' => 60, 'maxlength' => 100, 'value' => $parse['imdbVotes'])); ?>
        <?php //echo $form->error($model, 'imdbVotes'); ?>
    </div>
    <div class="field">

        <?php echo $form->labelEx($model, 'Genre'); ?> </br>

        <label for=""><?php echo($parse['Genre']); ?></label></br>
        <?php echo CHtml::activeCheckBoxList($model, 'id', CHtml::listData(Genre::model()->findAll(), 'id', 'name_genre'), array('class' => 'genre')); ?>


    </div>



    <h1>Серии</h1>

    <?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'My tab 1')); ?>

    <?php $this->endWidget(); ?>

    <?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'My tab 2')); ?>
    My tab 2 ...
    <?php $this->endWidget(); ?>

    <?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'My tab 3')); ?>
    My tab 3 ...
    <?php $this->endWidget(); ?>

    <?php
    $tabParameters = array();
    foreach($this->clips as $key=>$clip) {

        $tabParameters['tab' . (count($tabParameters) + 1)] = array('title' => $key, 'content' => $clip);

    }

$series = json_encode($tabParameters);  ?>
    <?php echo '<pre>';
    var_dump(json_encode($tabParameters));
    echo '</pre>'; ?>


    <?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>

    <?php echo $form->hiddenField($model, 'test', ['value'=>$series]); ?>
    <h1>Актеры</h1>






    <div class="field buttons">
        <?php $_POST["Tvseries"]['series'] = $tabParameters; ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => "btn btn-info"] ); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->