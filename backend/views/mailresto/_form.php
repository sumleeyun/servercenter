<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\tblMailresto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-mailresto-form ">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-4"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>

        <div class="col-sm-4"> <?= $form->field($model, 'dbmail')->textInput(['maxlength' => true]) ?></div>

        <div class="col-sm-4"><?= $form->field($model, 'dbff')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            เลือกสถานะ
            <?= $form->field($model, 'status')->radio(['label' => 'Not restore', 'value' => 0]) ?>   
            <?= $form->field($model, 'status')->radio(['label' => 'Yes restore', 'value' => 1]) ?> 
        </div>
        <div class="col-sm-4">
            Note
             <?= $form->field($model, 'note')->radio(['label' => 'ไม่มีการตอบเมล์', 'value' => 'ไม่มีการตอบเมล์']) ?>   
            <?= $form->field($model, 'note')->radio(['label' => 'สมบูรณ์', 'value' => 'สมบูรณ์']) ?> 
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">

    <?php
    echo $form->field($model, 'name_by')->dropDownList([
        'ภาณุเดช' => 'ภาณุเดช',
        'ทศพล ' => 'ทศพล',
            ], ['prompt' => ' เลือกผู้กรอก']
    );
    ?>
        </div>

        <div class="col-sm-4">
        <?php
    echo $form->field($model, 'user_create')->dropDownList(
            [
                'thanapol_san' => 'thanapol_san',
                'nattapon_so' => 'nattapon_so'
            ], 
            ['prompt' => ' เลือก user admin']
    );
    ?>
        
        </div>

        <div class="col-sm-4">
        
        <?= $form->field($model, 'create_y')->widget(
         DateTimePicker::className(), [
             'language' => 'th',
              'options' => ['placeholder' => 'Select issue date ...'],
             'pluginOptions' => [
                 'format' => 'yyyy-mm-dd hh:ii:ss',
                 'todayHighlight' => true   
             ]
     ]);?>
        
        </div>
        
        </div>
    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

        <?php ActiveForm::end(); ?>

</div>
