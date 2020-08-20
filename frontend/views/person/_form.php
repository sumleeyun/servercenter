<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    <?php
    $grouptype = \app\models\Pergroup::find()->select(['group_name'])->indexBy('id')->column();

    echo $form->field($model, 'group_id')->widget(Select2::classname(), [
        'data' => $grouptype,
        'options' => ['placeholder' => 'เลือกหน่วยงาน ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('หน่วยงาน');
    ?>

    <?php // $form->field($model, 'group_id')->textInput()  ?>

    <?php // $form->field($model, 'status_kms')->textInput() ?>
    <?php // $form->field($model, 'status_social')->textInput()  ?>

    <?php
    echo $form->field($model, 'status_kms')->dropDownList(
            [ '0' => 'ยังไม่เข้า','1' => 'เข้าแล้ว']
    );
    ?>  
    <?php
    echo $form->field($model, 'status_social')->dropDownList(
            [ '0' => 'ยังไม่เข้า','1' => 'เข้าแล้ว']
    );
    ?>  

<?=  $form->field($model, 'person_note')->textarea(['row'=>'6'])
            ->hint('*ในกรณี ไม่ชื่อในระบบ ไม่รู้สังกัด ให้ ปรับย้ายไปส่วนกลาง')
            ?>
 <?=
            $form->field($model, 'date_by')->widget(
                    DatePicker::className(), [
                'language' => 'th',
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>  
    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
