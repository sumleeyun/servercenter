<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Components */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="components-form">

    <?php $form = ActiveForm::begin([
            //'action' => ['comments/ajax-comment'],
    'options' => [
        'class' => 'comment-form'
    ]
            
            ]); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nameComponents')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

