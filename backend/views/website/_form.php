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





    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">NETWORK</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <?php
//                $modelSystem = '';
//                $datasys = app\models\TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column();
//                if ($model->product_id) {
//                    $modelSystem
//                    $chsys = '';
//                } else {
//                    $chsys = $modelSystem->id;
//                    
//                }
                echo $form->field($model, 'product_id')->widget(Select2::classname(), [
                    'data' => $model->getSystem($modelSystem),
//                    'options' => ['placeholder' => 'Select ระบบงาน ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('เลือกระบบงาน ');
                ?>

            </div>
            <div class="col-md-12">

                <?php
//                echo $modelSystem->id ;
                $dataIPserver = \app\models\TblServerall::find()->select(['IpServer'])->indexBy('IpServer')->column();
                echo $form->field($model, 'ipServer')->widget(Select2::classname(), [
                    'data' => $dataIPserver,
                    'options' => ['placeholder' => 'Select IP Address ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('IP Address');
                ?>
            </div>
            <div class="col-md-12">
                <?php //  $form->field($model, 'ipMapServer')->textInput(['maxlength' => true])  ?>

                <?php
                echo $form->field($model, 'ipMapServer')->dropDownList([
                    'Intarnet' => 'Intarnet ภายใน',
                    'Internet' => 'Internet ภายนอก',
                        ], ['prompt' => ' เครื่อข่ายระบบ']
                );
                ?>

            </div>

            <div class="col-md-6">

                <?php
                $dataDep = TblDepartment::find()->select(['nameDepartment', 'codeDepartment'])->indexBy('codeDepartment')->column();

                echo $form->field($model, 'Department')->widget(Select2::classname(), [
                    'data' => $dataDep,
                    'options' => ['placeholder' => 'Select หน่วยงานรับผิดชอบ ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('หน่วยงาน');
                ?>
            </div>

            <div class="col-md-6">
                <?php
                $dataAdmin = app\models\AdminDetail::find()->select(['name', 'id'])->indexBy('id')->column();

                echo $form->field($model, 'adminDetail')->widget(Select2::classname(), [
                    'data' => $dataAdmin,
                    'options' => ['placeholder' => 'Select Admin ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('เจ้าหน้าทีดูแล');
                ?>
            </div>

            <?php if ($model->isNewRecord) { ?>
                <div class="col-md-2"> <?= $form->field($model, 'url_perfix')->textInput(['value' => 'http://'])->hint('http:// และ https://') ?></div>
            <?php } else { ?>
                <div class="col-md-2"> <?= $form->field($model, 'url_perfix')->textInput()->hint('http:// และ https://') ?></div>
            <?php } ?>


            <div class="col-md-2"><?= $form->field($model, 'url_sub')->textInput()->hint('www,www2,www3') ?></div>
            <div class="col-md-4"><?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'history3')->textInput(['maxlength' => true])->label('ชื่อโดเมนภาษาไทย') ?></div>








            <div class="col-md-12">
                <?= $form->field($model, 'short_remarks')->textarea(['rows' => 6]) ?>

            </div>


            <div class="col-md-12">
                <?= $form->field($model, 'history1')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'history2')->textInput(['maxlength' => true]) ?>


            </div>



        </div>
    </div>

    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">รายละเอียด</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-12">

                <?php
                $dataAdmin = app\models\program::find()->select(['concat(name,version) as nameall', 'id'])->where(['IN', 'type', ['app', 'dev']])->indexBy('id')->column();

                echo $form->field($model, 'program_id')->widget(Select2::classname(), [
                    'data' => $dataAdmin,
                    'options' => ['placeholder' => 'โปรแกรมทีใช้ ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('โปรแกรม');
                ?>
                <?= $form->field($model, 'software_detail')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'software')->textInput(['maxlength' => true]) ?> 
            </div>

            <div class="col-md-6"><?= $form->field($model, 'userweb')->textInput(['maxlength' => true]) ?> </div>

            <div class="col-md-6"> <?= $form->field($model, 'pwdweb')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-6"><?= $form->field($model, 'userFtp')->textInput(['maxlength' => true]) ?></div>

            <div class="col-md-6"><?= $form->field($model, 'pwdFtp')->textInput(['maxlength' => true]) ?></div>

            <div class="col-md-4"><?= $form->field($model, 'dbName')->textInput(['maxlength' => true]) ?></div>

            <div class="col-md-4"><?= $form->field($model, 'userDb')->textInput(['maxlength' => true]) ?></div>

            <div class="col-md-4"><?= $form->field($model, 'pwdDb')->textInput(['maxlength' => true]) ?></div>



        </div>
    </div> 

    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">สถานะ web site</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-12">
                <?php
//                echo $form->field($model, 'status')->dropDownList(
//                        ['6' => 'Inactive', '1' => 'Active', '2' => 'รอปรับปรุง', '3' => 'รอลบถาวร', '4' => 'ระงับชั่วคราว']
//                );
                ?>    

                <?php
                // $status = $model->StatusList;
                echo $form->field($model, 'status')->widget(Select2::classname(), [
                    'data' => $model->statusList,
                    //'options' => ['placeholder' => 'Select Admin ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('สถานะ');
                ?>   
            </div>
            <div class="col-md-6">
                <?=
                $form->field($model, 'modified')->widget(
                        DateTimePicker::className(), [
                    'language' => 'th',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight' => true
                    ]
                ])->label('วันที่อัพเดรตล่าสุด');
                ?>
            </div>
            <div class="col-md-6"><?= $form->field($model, 'modified_by')->textInput()->label('จนท.แก้ไขล่าสุด') ?>  </div>

            <div class="col-md-6">          

                <?=
                $form->field($model, 'created')->widget(
                        DateTimePicker::className(), [
                    'language' => 'th',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight' => true
                    ]
                ])->label('วันที่สร้างwebsite');
                ?>
            </div>
            <div class="col-md-6"><?= $form->field($model, 'created_by')->textInput()->label('จนท.ผู้สร้าง') ?> </div>

        </div> 

    </div>

    <div class="form-group">
        <?php // Html::submitButton('Save', ['class' => 'btn btn-success'])    ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
