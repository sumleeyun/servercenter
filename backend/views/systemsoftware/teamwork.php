<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DateTimePicker;
use yii\web\UploadedFile;
use yii\web\JsExpression;
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

            <?php // $form->field($model, 'system_id')->textInput(['maxlength' => true])  ?>

            <?php // $form->field($model, 'admin_id')->textInput(['maxlength' => true])  ?>

            <?php
            $dataAdmin = app\models\AdminDetail::find()->select(['name', 'id'])->orderBy(['name' => SORT_DESC])->indexBy('id')->column();

            echo $form->field($model, 'admin_id')->widget(Select2::classname(), [
                'data' => $dataAdmin,
                'options' => ['placeholder' => 'เลือกผู้ดูแล ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            <?= $form->field($model, 'job_description')->textInput(['maxlength' => true]) ?>




        

    


    <div class="modal-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
