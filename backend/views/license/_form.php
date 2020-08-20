<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\license */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="license-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'software')->textInput(['maxlength' => true]) ?></div>

        <?php //  $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        <div class="col-md-6"><?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?></div>

    </div>

    <div class="row">

        <div class="col-md-4"><?= $form->field($model, 'qua_all')->textInput() ?></div>

        <div class="col-md-4"><?= $form->field($model, 'qua_usad')->textInput() ?></div>

        <div class="col-md-4"><?= $form->field($model, 'qua_available')->textInput() ?></div>
        <div class="col-md-6"><?= $form->field($model, 'license_detail')->textInput(['maxlength' => true]) ?></div>

        <div class="col-md-6"><?= $form->field($model, 'license_key')->textInput(['maxlength' => true]) ?></div>

    </div>





    <?php //  $form->field($model, 'start_date')->textInput() ?>

    <?php //  $form->field($model, 'expire_date')->textInput() ?>

    <div class="row">

        <div class="col-md-6">

            <?=
            $form->field($model, 'start_date')->widget(
                    DateTimePicker::className(), [
                //'language' => 'th',
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd hh:ii:ss',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $form->field($model, 'expire_date')->widget(
                    DateTimePicker::className(), [
                //'language' => 'th',
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd hh:ii:ss',
                    'todayHighlight' => true
                ]
            ]);
            ?>    
        </div>
        <?php //  $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'status')->dropDownList([
                'IN' => 'IN',
                
                'OUT' => 'OUT',
                'no expired' => 'no expired',
                
                    ], ['prompt' => ' สถานะ']
            );
            ?>
        </div>
        <div class="col-md-8">
            <?php
            $dataDep = app\models\TblDepartment::find()->select(['nameDepartment', 'codeDepartment'])->indexBy('codeDepartment')->column();

            echo $form->field($model, 'operate_by')->widget(Select2::classname(), [
                'data' => $dataDep,
                'options' => ['placeholder' => 'Select หน่วยงานรับผิดชอบ ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('หน่วยงาน');
            ?>
        </div>
        <div class="col-md-12">
            <?php //  $form->field($model, 'operate_by')->textInput() ?>

            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <?php //  $form->field($model, 'software_id')->textInput() ?>
    <?php
    $dataSys = \app\models\TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column();

    echo $form->field($model, 'software_id')->widget(Select2::classname(), [
        'data' => $dataSys,
        'options' => ['placeholder' => 'Select ระบบงาน ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('ระบบงาน');
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
