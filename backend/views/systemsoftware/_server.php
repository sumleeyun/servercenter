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
    <div class="roll">
        <div class="col-md-6">
    <?php
    $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

    <?= $form->field($model, 'systemname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'systemENG')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'room')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'rack')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'u_no')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'pmvusers')->textInput() ?>
        </div>
<div class="col-md-6">
            
    <?php
                //$dataDep = app\models\

                echo $form->field($model, 'pmvusers')->widget(Select2::classname(), [
                    'data' => $model->listDep,
                    'options' => ['placeholder' => 'Select หน่วยงานรับผิดชอบ ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
    
    
    
    <?php // $form->field($model, 'adminsys')->textInput() ?>
    
    <?php
                //$dataAdmin = app\models\AdminDetail::find()->select(['name', 'id'])->indexBy('id')->column();

                echo $form->field($model, 'adminsys')->widget(Select2::classname(), [
                    'data' => $model->listAdmin,
                    'options' => ['placeholder' => 'Select Admin ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

    
                 <?php
                //$datacompany = app\models\Company::find()->select(['company_nameT', 'id'])->indexBy('id')->column();

                echo $form->field($model, 'company_id')->widget(Select2::classname(), [
                    'data' => $model->listCompany,
                    'options' => ['placeholder' => 'Select บริษัท ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
                
                <?php // $form->field($model, 'company')->textInput() ?>
    

    <?php // $form->field($model, 'create_at')->textInput() ?>
    <?php // $form->field($model, 'update_at')->textInput() ?>
    
    <?=
                $form->field($model, 'system_dayjob')->widget(
                        DateTimePicker::className(), [
                    'language' => 'th',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight' => true
                    ]
                ]);
                ?>

     
        </div>
        
    </div>
    
    <div class="row"> 
    <div class="col-md-12"><?= $form->field($model, 'remak')->textarea(['rows' => 6]) ?></div>
            <div class="col-md-2">
                <div class="well text-center">
                    <?= Html::img($model->getPhotoViewer(), ['style' => 'width:600;', 'class' => 'img-rounded']); ?>
                </div>

                <?= $form->field($model, 'photo')->fileInput() ?>
            </div>


        
        </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    
</div>
