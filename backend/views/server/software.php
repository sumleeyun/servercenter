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
                     <?php // $form->field($model, 'ipaddress')->textInput(['maxlength' => true]) ?>
                    <?php
                    $program = app\models\program::find()->select(['concat(name,version) as nameall', 'id'])->orderBy(['name' => SORT_DESC ])->indexBy('id')->column();

                    echo $form->field($model, 'program_id')->widget(Select2::classname(), [
                        'data' => $program,
                        'options' => ['placeholder' => 'โปรแกรม ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                    <?php
                    $account = app\models\TblUserSystem::find()->select(['concat(username,password) as userpass', 'id'])->indexBy('id')->column();

                    echo $form->field($model, 'usersystem_id')->widget(Select2::classname(), [
                        'data' => $account,
                        'options' => ['placeholder' => 'ผู้ใช้งานระบบ ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                    <?= $form->field($model, 'accessRoute')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'note')->textarea(['rows' => 5]) ?>
                    
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

