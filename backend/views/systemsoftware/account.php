<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblUserSystem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-system-form">
<?php
            $form = ActiveForm::begin(['enableClientValidation' => true,
                        'options' => [
                            'id' => 'dynamic-form'
            ]]);
            ?>
    

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block')->textInput(['maxlength' => true]) ?>

  
    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'update_at')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'update_by')->textInput() ?>

    <div class="form-group">
         
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'บันทึก') : Yii::t('app', 'แก้ไข'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
