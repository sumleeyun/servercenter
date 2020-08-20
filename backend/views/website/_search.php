<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\websiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="website-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?= $form->field($model, 'URL') ?>

    <?php // $form->field($model, 'short_remarks') ?>

    <?php
    //q คือการกำหนดตัวแปรเองโดยไม่มีใน ฐานข้อมูล
    // $form->field($model, 'q')->label('IP Address') ?>

    <?php // $form->field($model, 'ipMapServer') ?>

    <?php // echo $form->field($model, 'history1') ?>

    <?php // echo $form->field($model, 'history2') ?>

    <?php // echo $form->field($model, 'history3') ?>

    <?php // echo $form->field($model, 'Department') ?>

    <?php // echo $form->field($model, 'adminDetail') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'software') ?>

    <?php // echo $form->field($model, 'software_detail') ?>

    <?php // echo $form->field($model, 'userweb') ?>

    <?php // echo $form->field($model, 'pwdweb') ?>

    <?php // echo $form->field($model, 'userFtp') ?>

    <?php // echo $form->field($model, 'pwdFtp') ?>

    <?php // echo $form->field($model, 'dbName') ?>

    <?php // echo $form->field($model, 'userDb') ?>

    <?php // echo $form->field($model, 'pwdDb') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'modified') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
