<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\systemsoftwareSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-systemsoftware-search">

   <div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true ]
    ]); ?>
    
       <div class="input-group mb-3 Right">
        <div class="col-md-4">
         <?php
                $dataDep = app\models\TblDepartment::find()->select(['nameDepartment', 'codeDepartment'])->indexBy('codeDepartment')->column();

                echo $form->field($model, 'pmvusers')->widget(Select2::classname(), [
                    'data' => $dataDep,
                    'options' => ['placeholder' => 'ค้นหาตามหน่วยงาน'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(FALSE);
                ?>
        </div>
        <div class="col-md-4">
           <?php
                $datacomp = app\models\Company::find()->select(['company_nameT', 'id'])->indexBy('id')->column();

                echo $form->field($model, 'company_id')->widget(Select2::classname(), [
                    'data' => $datacomp,
                    'options' => ['placeholder' => 'ค้นหาตามบริษัท'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(FALSE);
                ?>
        </div>
   
           
           <div class="col-md-4"><?= $form->field($model, 'system_dayjob') ?> </div>
           
        </div>
       
       <div class="input-group">
        
      <?= Html::activeTextInput($model, 'systemname',['class'=>'form-control','placeholder'=>'ค้นหาข้อมูลระบบงาน...']) ?>
        
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
        <?php // Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-default']) ?>
      </span>
    
    </div>
    <?php ActiveForm::end(); ?>

</div>

</div>
