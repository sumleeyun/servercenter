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
            <h3 class="box-title">สถานะ web site</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-12">
                

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
                
            </div>
            
            
            
            
        </div> 

    </div>

    <div class="form-group">
        <?php // Html::submitButton('Save', ['class' => 'btn btn-success'])    ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
