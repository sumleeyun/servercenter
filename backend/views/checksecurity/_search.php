<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\checksecuritySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-check-security-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'check_id') ?>

    <?= $form->field($model, 'server_ip') ?>

    <?= $form->field($model, 'check_dns') ?>

    <?= $form->field($model, 'check_ad') ?>

    <?= $form->field($model, 'check_antivirus') ?>

    <?php // echo $form->field($model, 'check_cypber') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
