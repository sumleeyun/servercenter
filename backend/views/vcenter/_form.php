<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\TblServerall;

/* @var $this yii\web\View */
/* @var $model app\models\vcenterhosts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vcenterhosts-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?php
    
    $dataserv = TblServerall::find()->select(['IpServer'])->where(['server_type_id'=>'2'])->indexBy('IpServer')->column();
 
    echo $form->field($model,'server_id')->widget(Select2::classname(), [
        'data' => $dataserv,
        'options' => ['placeholder' => 'Select IP ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'license')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpu')->textInput() ?>

    <?= $form->field($model, 'memory')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
