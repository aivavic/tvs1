<article class="view col-lg-5">
<h1 class="noshadow">Регистрация</h1>

<?php if (Yii::app()->user->hasFlash('registration')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('registration'); ?>
    </div>

<?php else: ?>
    <p>Пожалуйста, представьтесь:</p>
    <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'register-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>

        <p class="note">Поля, отмеченные <span class="required">*</span> обязательны.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="field">
            <?php echo $form->labelEx($model, 'username') . '</br>'; ?>

            <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 128, 'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'username', array('class' => 'text-warning')); ?>
        </div>

        <div class="field">
            <?php echo $form->labelEx($model, 'email') . '</br>'; ?>
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128, 'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'email', array('class' => 'text-warning')); ?>
        </div>

        <div class="field">
            <?php echo $form->labelEx($model, 'password') . '</br>'; ?>
            <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 64, 'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'password', array('class' => 'text-warning')); ?>
        </div>


        <div class="field">
            <?php echo $form->labelEx($model, 'gender') . '</br>'; ?>
            <?php echo $form->dropDownList($model, 'gender', CHtml::listData(Gender::model()->findAll(), 'id', 'gender'),array('empty'=>'Укажите пол', 'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'gender', array('class' => 'text-warning')); ?>
        </div>

        <div class="field">
            <?php echo $form->labelEx($model, 'avatar'); ?>
            <?php echo $form->fileField($model, 'avatar'); ?>
            <?php echo $form->error($model, 'avatar', array('class' => 'text-warning')); ?>
        </div>

        <div class="field">
            <?php echo $form->labelEx($model, 'dob') . '</br>'; ?>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'User[dob]',
                'id' => $model['dob'],
                'language'=> 'ru',

                //'flat' => true,
                'value' => Yii::app()->dateFormatter->format('yyyy-mm-dd', strtotime($model->dob)),
                'options' => array(
                    'nextText' => 'След',
                    'prevText' => 'Пред',
                    'dateFormat' => 'yy-mm-dd',

                    'showAnim' => 'slide',
                    'changeMonth' => true,
                    'changeYear' => true,

                ),
                'htmlOptions' => array(

                ),

                'themeUrl' => '/css/themes',
                'theme' => 'tvs',
                'cssFile' => array('DatePicker.css')
            )); ?>
            <i class="fa fa-caret-down"></i>
            <?php echo $form->error($model, 'dob', array('class' => 'text-warning')); ?>
        </div>
        <?php if (CCaptcha::checkRequirements()): ?>
            <div class="field">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control')); ?>
                </div>
                <div class="hint">Пожалуйста, введите буквы, изображенные на картинке выше.
                                  <br/>   Буквы не чувствительны к регистру.

                </div>
                <?php echo $form->error($model, 'verifyCode', array('class' => 'text-warning')); ?>
            </div>
        <?php endif; ?>
        <div class="field buttons">
            <?php echo CHtml::submitButton('Регистрация', array('class'=>'btn btn-info col-lg-12', )); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
<?php endif; ?>
</article>