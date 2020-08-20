<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblworkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblwork-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'topic') ?>

    <?= $form->field($model, 'server_ip') ?>

    <?= $form->field($model, 'url_server') ?>

    <?= $form->field($model, 'dep_id') ?>
   

    <?= $form->field($model, 'eadmin_sn') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'date_job') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
