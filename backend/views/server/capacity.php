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
                      <?= $form->field($model, 'chkstatus')->radioList(array('1' => 'ตรวจสอบแล้ว')); ?>
                    <?php
                    //$program = app\models\program::find()->select(['concat(name,version) as nameall', 'id'])->orderBy(['name' => SORT_DESC ])->indexBy('id')->column();

                    echo $form->field($model, 'capacity')->widget(Select2::classname(), [
                        'data' => $model->statusList,
                        'options' => ['placeholder' => 'รายการสถานะ ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                    
                    <?=
                    $form->field($model, 'capacity_date')->widget(
                            DateTimePicker::className(), [
                        'language' => 'th',
                        'options' => ['placeholder' => 'วันที่ตรวจสอบ ...'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii:ss',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                    
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

