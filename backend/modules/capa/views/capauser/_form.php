<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\modules\capa\models\Capauser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capauser-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title ">เพิ่มสิทธิ์ผู้ใชงาน</h3>
        </div>
        <div class="box-body">



            <?php if (!empty($id)) {
                $model->username = $id;
            } ?>

            <div class="col-md-12"> <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?> </div>

            <div class="col-md-3"><?= $form->field($model, 'vpn')->checkbox(['uncheck' => 'null', 'checked' => '1', 'selected' => true]); ?></div>
           <div class="col-md-3"> <?= $form->field($model, 'otp')->checkbox(['uncheck' => 'null', 'checked' => '1', 'selected' => true]); ?></div>
           <div class="col-md-3"> <?= $form->field($model, 'cyberark')->checkbox(['uncheck' => 'null', 'checked' => '1', 'selected' => true]); ?></div>
           <div class="col-md-3"></div>
           <div class="col-md-12">
 <?php
//                echo $modelSystem->id ;
            $dataIPserver = \app\models\TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column();
            echo $form->field($model, 'program')->widget(Select2::classname(), [
                'data' => $dataIPserver,
                'options' => ['placeholder' => 'Select program ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('program');
            ?>


            <?php
            $channel = app\models\support_Channel::find()->select(['channel_name', 'channel_id'])->indexBy('channel_id')->column();

            echo $form->field($model, 'channel')->widget(Select2::classname(), [
                'data' => $channel,
                'options' => ['placeholder' => 'ช่องทางติดต่อ'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>


<?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'check')->checkbox(['uncheck' => '0', 'checked' => '1', 'selected' => true]); ?>



            <?php // $form->field($model, 'check')->checkBox(['label' => ..., 'uncheck' => null, 'checked' => true]);  ?>
            <?php // $form->field($model, 'vpn')->textInput(['maxlength' => true]) ?>

            <?php // $form->field($model, 'otp')->textInput(['maxlength' => true]) ?>

            <?php // $form->field($model, 'cyberark')->textInput(['maxlength' => true]) ?>

            <?php //  $form->field($model, 'check')->textInput() ?>

            <?php // $form->field($model, 'updated_at')->textInput() ?>

            <?php // $form->field($model, 'updated_by')->textInput() ?>

            <?php // $form->field($model, 'created_at')->textInput() ?>

                <?php //  $form->field($model, 'created_by')->textInput()  ?>
           
            <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
<?php ActiveForm::end(); ?>

    </div>
