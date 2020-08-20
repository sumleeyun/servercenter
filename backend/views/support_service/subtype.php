<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DateTimePicker;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\TblSystemsoftware */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-systemsoftware-form">

    <?php
    $form = ActiveForm::begin(['enableClientValidation' => true,
                'options' => [
                    'id' => 'dynamic-form'
    ]]);
    ?>
    <?= $form->field($model, 'type_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'subtype_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtype_notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>



    <div class="modal-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
