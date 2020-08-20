<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Datastore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datastore-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'store_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capcity')->textInput() ?>

    <?= $form->field($model, 'space')->textInput() ?>

    <?= $form->field($model, 'freespace')->textInput() ?>

    <?= $form->field($model, 'lastupdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
