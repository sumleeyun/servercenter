<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\support_serviceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php // $form->field($model, 'service_id') ?>

    <?= $form->field($model, 'service_name') ?>

    <?php // $form->field($model, 'subtype_id') ?>
<?php
                $datatype = app\models\support_service_type::find()->select(['type_name', 'type_id'])->indexBy('type_id')->column();

                echo $form->field($model, 'type_id')->widget(Select2::classname(), [
                    'data' => $datatype,
                    'options' => ['placeholder' => 'ประเภทงาน'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
        </div>
    
        <?php // $form->field($model, 'type_id') ?>

    <?php // $form->field($model, 'channel_id') ?>
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

    <?php // echo $form->field($model, 'url_id') ?>

    <?php // echo $form->field($model, 'worknum') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'request_id') ?>

    <?php // echo $form->field($model, 'request_date') ?>
<?=
    $form->field($model, 'request_date')->widget(DatePicker::className(),
    [
        'name' => 'check_issue_date',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
         //'type' => DateTimePicker::TYPE_INPUT,
	'value' => date('yyyy-mm-dd'),
	//'options' => ['placeholder' => 'Select issue date ...'],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
            ]
    ]); 
?>



<?php /*if ($from =='dashboard'){
    echo $form->field($model, 'service_date') ;
}*/ ?>

    <?php // echo $form->field($model, 'urgency_id') ?>

    <?php // echo $form->field($model, 'level_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'reserved') ?>

    <?php // echo $form->field($model, 'response_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
