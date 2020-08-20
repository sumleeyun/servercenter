<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\TblCheckSecurity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-check-security-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'server_ip')->textInput(['maxlength' => true]) ?>
     <?php
                $dataIPserver = \app\models\TblServerall::find()->select(['IpServer'])->indexBy('IpServer')->column();

                echo $form->field($model, 'server_ip')->widget(Select2::classname(), [
                    'data' => $dataIPserver,
                    'options' => ['placeholder' => 'Select IP Address ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('IP Address');
                ?>

                

    <?php // $form->field($model, 'check_dns')->textInput() ?>
     <?php
                $dataDns = \app\models\TblCheckName::find()->select(['check_name'])->where(['typechk_id' => 1])->indexBy('id')->column();

                echo $form->field($model, 'check_dns')->widget(Select2::classname(), [
                    'data' => $dataDns,
                    'options' => ['placeholder' => 'DNS ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

    <?= $form->field($model, 'check_ad')->textInput() ?>

    <?php // $form->field($model, 'check_antivirus')->textInput() ?>
    <?php
                $datanti = \app\models\TblCheckName::find()->select(['check_name'])->where(['typechk_id' => 3])->indexBy('id')->column();

                echo $form->field($model, 'check_antivirus')->widget(Select2::classname(), [
                    'data' => $datanti,
                    'options' => ['placeholder' => 'antivirus ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

    <?php // $form->field($model, 'check_cypber')->textInput() ?>
     <?php
                $dataCyper = \app\models\TblCheckName::find()->select(['check_name'])->where(['typechk_id' => 4])->indexBy('id')->column();

                echo $form->field($model, 'check_cypber')->widget(Select2::classname(), [
                    'data' => $dataCyper,
                    'options' => ['placeholder' => 'cyber ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>
    <?= $form->field($model, 'created_at')->widget(
                        DateTimePicker::className(), [
                    'language' => 'th',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight' => true
                    ]
                ])->label('วันที่ตรวจสอบ');
                ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
