<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Dboidguser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dboidguser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Email')->textInput() ?>

    <?= $form->field($model, 'IdCard')->textInput() ?>

    <?= $form->field($model, 'IdGvm')->textInput() ?>

    <?= $form->field($model, 'BirthDate')->textInput() ?>

    <?= $form->field($model, 'FirstName')->textInput() ?>

    <?= $form->field($model, 'LastName')->textInput() ?>

    <?= $form->field($model, 'FirstNameEn')->textInput() ?>

    <?= $form->field($model, 'LastNameEn')->textInput() ?>

    <?= $form->field($model, 'Rank')->textInput() ?>

    <?= $form->field($model, 'Unit')->textInput() ?>

    <?= $form->field($model, 'Password')->passwordInput() ?>

    <?= $form->field($model, 'Format')->textInput() ?>

    <?= $form->field($model, 'Question')->textInput() ?>

    <?= $form->field($model, 'Answer')->textInput() ?>

    <?= $form->field($model, 'Position')->textInput() ?>

    <?= $form->field($model, 'UserName')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput() ?>

    <?= $form->field($model, 'ADStatus')->textInput() ?>

    <?= $form->field($model, 'MailStatus')->textInput() ?>

    <?= $form->field($model, 'Type')->textInput() ?>

    <?= $form->field($model, 'Tel')->textInput() ?>

    <?= $form->field($model, 'Type_Rank')->textInput() ?>

    <?= $form->field($model, 'UpdateDate')->textInput() ?>

    <?= $form->field($model, 'CreateDate')->textInput() ?>

    <?= $form->field($model, 'Remark')->textInput() ?>

    <?= $form->field($model, 'PasswordOld')->textInput() ?>

    <?= $form->field($model, 'Permission')->textInput() ?>

    <?= $form->field($model, 'Division')->textInput() ?>

    <?= $form->field($model, 'WorkingYear')->textInput() ?>

    <?= $form->field($model, 'WorkingRank')->textInput() ?>

    <?= $form->field($model, 'PosAction')->textInput() ?>

    <?= $form->field($model, 'SecEmail')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
