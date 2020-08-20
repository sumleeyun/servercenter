<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use unclead\multipleinput\MultipleInput;
use kartik\widgets\DateTimePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TblServerall */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-serverall-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">


        <div class="box box-solid box-info">
            <div class="box-header">
                <h3 class="box-title">รายละเอียดโปรแกรม</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <?php // $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
                <?=  $form->field($model, 'url_perfix')->textInput(['maxlength' => true]) ?>
                <?=  $form->field($model, 'url_sub')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'userweb')->textInput(['maxlength' => true]) ?> 

             <?= $form->field($model, 'pwdweb')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'history3')->textInput(['maxlength' => true])->label('ชื่อโดเมนภาษาไทย') ?>
                <?= $form->field($model, 'short_remarks')->textarea(['rows' => 6]) ?>

            </div><!-- /.box-body -->
        </div>

    </div>




    <div class="row">

        <div class="form-group text-center">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

