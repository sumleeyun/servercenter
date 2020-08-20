<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServerallSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-serverall-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IpServer') ?>

    <?= $form->field($model, 'TypeServer') ?>

    <?= $form->field($model, 'OS') ?>

    <?= $form->field($model, 'program') ?>

    <?php //$form->field($model, 'computerName') ?>

    <?php  echo $form->field($model, 'hardware') ?>
    <?php  echo $form->field($model, 'systemsoftware_id') ?>
    <?php  echo $form->field($model, 'cpu') ?>
    <?php  echo $form->field($model, 'memory') ?>
    <?php  echo $form->field($model, 'harddisk') ?>
    <?php  echo $form->field($model, 'mapWithWapple') ?>

    <?php echo $form->field($model, 'Description') ?>

    <?php // echo $form->field($model, 'tool') ?>

    <?php // echo $form->field($model, 'servicePort') ?>

    <?php // echo $form->field($model, 'subnetMask') ?>

    <?php // echo $form->field($model, 'gateway') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'pw') ?>

    <?php // echo $form->field($model, 'userPwAnother') ?>

    <?php // echo $form->field($model, 'remak1') ?>

    <?php // echo $form->field($model, 'remark2') ?>

    <?php // echo $form->field($model, 'adminServer') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
