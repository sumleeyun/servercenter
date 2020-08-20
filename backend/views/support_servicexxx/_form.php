<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use unclead\multipleinput\MultipleInput;
use kartik\widgets\DateTimePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\support_service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service_name')->textInput(['maxlength' => true]) ?>

    <?php
    $type = app\models\support_service_type::find()->select(['type_name', 'type_id'])->indexBy('type_id')->column();

    echo $form->field($model, 'type_id')->widget(Select2::classname(), [
        'data' => $type,
        'options' => ['placeholder' => 'ประเภทการให้บริการ'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?php
    $subtype = app\models\support_service_subtype::find()->select(['subtype_name', 'subtype_id'])->indexBy('subtype_id')->column();

    echo $form->field($model, 'subtype_id')->widget(Select2::classname(), [
        'data' => $subtype,
        'options' => ['placeholder' => 'รายละเอียดบริการ ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $channel = app\models\support_Channel::find()->select(['channel_name', 'channel_id'])->indexBy('channel_id')->column();

    echo $form->field($model, 'channel_id')->widget(Select2::classname(), [
        'data' => $channel,
        'options' => ['placeholder' => 'ช่องทางติดต่อ'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php // $form->field($model, 'channel_id')->textInput()  ?>

    <?php //$form->field($model, 'url_id')->textInput()  ?>

    <?php
    $serivceurl = app\models\support_Url::find()->select(['url_name', 'url_id'])->indexBy('url_id')->column();

    echo $form->field($model, 'url_id')->widget(Select2::classname(), [
        'data' => $serivceurl,
        'options' => ['placeholder' => 'url ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'worknum')->textInput(['value'=>'1']) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?php if (!Yii::$app->user->isGuest) { $username1 = Yii::$app->user->identity->username; } ?>
        <?= $form->field($model, 'request_id')->textInput(['value'=>$username1]) ?>

        <?php // $form->field($model, 'request_date')->textInput() ?>
        <?=
        $form->field($model, 'request_date')->widget(
                DateTimePicker::className(), [
            'language' => 'th',
            'options' => ['placeholder' => 'Select request_date  ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd hh:ii:ss',
                'todayHighlight' => true,
            ]
        ]);
        ?>

        <?php // $form->field($model, 'service_date')->textInput()  ?>
        <?php
        $urgency = app\models\support_Urgency::find()->select(['urgency_name', 'urgency_id'])->indexBy('urgency_id')->column();

        echo $form->field($model, 'urgency_id')->widget(Select2::classname(), [
            'data' => $urgency,
            'options' => ['placeholder' => 'ระดับความเร่งด่วน ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>

        <?php // $form->field($model, 'urgency_id')->textInput()   ?>

        <?= $form->field($model, 'level_id')->textInput(['value' => '4']) ?>

        <?= $form->field($model, 'status_id')->textInput(['value' => '2'])->hint("2=Open Ticket") ?>
        <?php
        /* $status = app\models\support_Status::find()->select(['status_name', 'status_id'])->indexBy('status_id')->column();

          echo $form->field($model, 'status_id')->widget(Select2::classname(), [
          'data' => $status,

          //'options' => ['placeholder' => 'สถานะ ...'],
          'pluginOptions' => [
          'allowClear' => true
          ],
          ]); */
        ?>

        <?= $form->field($model, 'reserved')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'response_id')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
