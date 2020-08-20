<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Datastore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datastore-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vcenter_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Capacity')->textInput() ?>

    <?= $form->field($model, 'Provisioned_Space')->textInput() ?>

    <?= $form->field($model, 'Free_Space')->textInput() ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
