<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\TblCheckName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-check-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'typechk_id')->textInput() ?>
    <?php
                $dataIPserver = \app\models\TblTypeCheck::find()->select(['typechk_name'])->indexBy('typechk_id')->column();

                echo $form->field($model, 'typechk_id')->widget(Select2::classname(), [
                    'data' => $dataIPserver,
                    'options' => ['placeholder' => 'Select ประเภทการตรวจ ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('ประเภทการตรวจ');
                ?>

    <?= $form->field($model, 'check_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
