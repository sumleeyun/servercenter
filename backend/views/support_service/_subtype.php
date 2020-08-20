<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\support_service_typeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-service-type-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['add'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1
                ],
    ]);
    ?>
    <div class="input-group">
        <?php //  Html::activeTextInput($model, 'q',['class'=>'form-control','placeholder'=>'ค้นหาข้อมูล...']) ?>
        <?php
        echo $form->field($model, 'type_id')->widget(Select2::classname(), [
            'data' => $model->listType,
//        'options' => ['placeholder' => 'เลือกประเภทงาน'],
            'pluginOptions' => [
                'allowClear' => true
            ],
//        'pluginEvents' => [
//            "select2:selecting" => "function() { log('selecting'); }",
//        ],
        ]);
        ?>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
            <?php // Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', ' สร้างประเภทงาน'), ['create'], ['class' => 'btn btn-default'])  ?>

            <?=
            Html::button('<span class="glyphicon glyphicon-plus"></span>', [
                'value' => Url::to(['support_service_type/create', 'ch' => 'ADD']),
                'class' => 'btn btn-primary',
                'id' => 'BtnModaltype',
                'data-toggle' => "modal",
                'data-target' => "#modalServiceType",
            ])
            ?>
            
    </div>


    <?php
    Modal::begin([
        'header' => 'ประเภทงานบริการ',
        'id' => 'modalServiceType',
        'size' => 'modal-lg',
        'class' => 'style=width:auto'
    ]);
    echo "<div id='modalContentServiceType'></div>";
    Modal::end();
    ?>
</span>
</div>
<?php ActiveForm::end(); ?>



<p></p>
</div>
<?php

