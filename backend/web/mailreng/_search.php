<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DboiduserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dboidguser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'IdCard') ?>

    <?= $form->field($model, 'IdGvm') ?>

    <?= $form->field($model, 'BirthDate') ?>

    <?php // echo $form->field($model, 'FirstName') ?>

    <?php // echo $form->field($model, 'LastName') ?>

    <?php // echo $form->field($model, 'FirstNameEn') ?>

    <?php // echo $form->field($model, 'LastNameEn') ?>

    <?php // echo $form->field($model, 'Rank') ?>

    <?php // echo $form->field($model, 'Unit') ?>

    <?php // echo $form->field($model, 'Password') ?>

    <?php // echo $form->field($model, 'Format') ?>

    <?php // echo $form->field($model, 'Question') ?>

    <?php // echo $form->field($model, 'Answer') ?>

    <?php // echo $form->field($model, 'Position') ?>

    <?php // echo $form->field($model, 'UserName') ?>

    <?php // echo $form->field($model, 'Name') ?>

    <?php // echo $form->field($model, 'ADStatus') ?>

    <?php // echo $form->field($model, 'MailStatus') ?>

    <?php // echo $form->field($model, 'Type') ?>

    <?php // echo $form->field($model, 'Tel') ?>

    <?php // echo $form->field($model, 'Type_Rank') ?>

    <?php // echo $form->field($model, 'UpdateDate') ?>

    <?php // echo $form->field($model, 'CreateDate') ?>

    <?php // echo $form->field($model, 'Remark') ?>

    <?php // echo $form->field($model, 'PasswordOld') ?>

    <?php // echo $form->field($model, 'Permission') ?>

    <?php // echo $form->field($model, 'Division') ?>

    <?php // echo $form->field($model, 'WorkingYear') ?>

    <?php // echo $form->field($model, 'WorkingRank') ?>

    <?php // echo $form->field($model, 'PosAction') ?>

    <?php // echo $form->field($model, 'SecEmail') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
