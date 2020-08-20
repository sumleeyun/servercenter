<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\depdrop\DepDrop;
use app\models\TblDepartment;
use app\models\AdminDetail;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Website */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="website-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ipServer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipMapServer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history3')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'Department')->textInput(['maxlength' => true]) ?>
    <?php
    $dataDep = TblDepartment::find()->select(['nameDepartment', 'codeDepartment'])->indexBy('codeDepartment')->column();

    echo $form->field($model, 'Department')->widget(Select2::classname(), [
        'data' => $dataDep,
        'options' => ['placeholder' => 'Select หน่วยงานรับผิดชอบ ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>



    <?php
    $dataAdmin = app\models\AdminDetail::find()->select(['name', 'id'])->indexBy('id')->column();

    echo $form->field($model, 'adminDetail')->widget(Select2::classname(), [
        'data' => $dataAdmin,
        'options' => ['placeholder' => 'Select Admin ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?php
    echo $form->field($model, 'status')->dropDownList(
            ['0' => 'Inactive', '1' => 'Active', '3' => 'ระงับ']
    );
    ?>    

    <?= $form->field($model, 'software')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'software_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userweb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pwdweb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userFtp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pwdFtp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dbName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userDb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pwdDb')->textInput(['maxlength' => true]) ?>


    <?php
    echo "วันที่สร้าง";
    ?>
    <?=
    $form->field($model, 'created')->widget(
            DateTimePicker::className(), [
        'language' => 'th',
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'created_by')->textInput() ?>


    <?=
    $form->field($model, 'modified')->widget(
            DateTimePicker::className(), [
        'language' => 'th',
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd hh:ii:ss',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
