<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\licenseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="license-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'software') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'qua_all') ?>

    <?= $form->field($model, 'qua_usad') ?>

    <?php // echo $form->field($model, 'qua_available') ?>

    <?php // echo $form->field($model, 'license_detail') ?>

    <?php // echo $form->field($model, 'license_key') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'expire_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'operate_by') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'software_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
