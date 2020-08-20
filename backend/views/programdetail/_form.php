<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Programdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ipaddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'program_id')->textInput() ?>

    <?= $form->field($model, 'usersystem_id')->textInput() ?>

    <?= $form->field($model, 'accessRoute')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
