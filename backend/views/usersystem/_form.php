<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\TblUserSystem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-system-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'block')->checkbox()->label('Active'); ?>
     <?php
//                echo $modelSystem->id ;
                $dataIPserver = \app\models\TblSystemsoftware::find()->select(['systemname','id'])->indexBy('id')->column();
                echo $form->field($model, 'software_id')->widget(Select2::classname(), [
                    'data' => $dataIPserver,
                    'options' => ['placeholder' => 'ระบบงาน ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('ระบบงาน');
                ?>
  
    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'update_at')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'update_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
