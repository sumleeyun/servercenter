<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Tblwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblwork-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'server_ip')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'eadmin_sn')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>
    <?php
//    $dataIPserver = \app\models\TblSystemsoftware::find()->select(['systemname'])->indexBy('id')->column();
//
//    echo $form->field($model, 'server_ip')->widget(Select2::classname(), [
//        'data' => $dataIPserver,
//        'options' => ['placeholder' => 'Select ระบบงาน ...'],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ])->label('ชื่อระบบงาน');
    ?>

    <?php // $form->field($model, 'url_server')->textInput() ?>

    <?php 
//    $dateURL = \app\models\Website::find()->select(['url'])->indexBy('id')->column();
//
//    echo $form->field($model, 'url_server')->widget(Select2::classname(), [
//        'data' => $dateURL,
//        'options' => ['placeholder' => 'Select URL ...'],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ])->label('URL');
    ?>




    <?php
    $dataDep = app\models\TblDepartment::find()->select(['nameDepartment', 'codeDepartment'])->indexBy('codeDepartment')->column();

    echo $form->field($model, 'dep_id')->widget(Select2::classname(), [
        'data' => $dataDep,
        'options' => ['placeholder' => 'Select หน่วยงาน ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('หน่วยงาน');
    ?>


 <?php
                $dataAdmin = app\models\AdminDetail::find()->select(['name', 'id'])->indexBy('id')->column();

                echo $form->field($model, 'collaborator')->widget(Select2::classname(), [
                    'data' => $dataAdmin,
                    'options' => ['placeholder' => 'Select Admin ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('ผู้ประสานงาน');
                ?>

 <?php // $form->field($model, 'covenant')->textInput(['maxlength' => 100]) ?>
    <?= $form->field($model, 'covenant')->widget(FileInput::classname(), [
    //'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'initialPreview'=>[],
        'allowedFileExtensions'=>['pdf'],
        'showPreview' => false,
        'showRemove' => true,
        'showUpload' => false
     ]
]); ?>

    <?php 
//    $form->field($model, 'date_job')->widget(
//            DateTimePicker::className(), [
//        'language' => 'th',
//        'options' => ['placeholder' => 'Select issue date ...'],
//        'pluginOptions' => [
//            'format' => 'yyyy-mm-dd hh:ii:ss',
//            'todayHighlight' => true
//        ]
//    ]);
    ?>

    <?php
//    echo $form->field($model, 'Status')->dropDownList(
//            [
//                '1' => 'รอการดำเนินงาน', '2' => 'กำลังรอเจ้าของงาน', '3' => 'ดำเนินการเรียบร้อย', 'ส่งเมล์ประสาน', 'ทำหนังสือตอบกลับแล้ว'
//            ]
//    );
    ?>  

    <?=  $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

     <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i> '.($model->isNewRecord ? 'Create' : 'Update'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary').' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
