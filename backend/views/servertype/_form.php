<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServerType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="server-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'server_type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'server_type_name_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'server_type_note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
