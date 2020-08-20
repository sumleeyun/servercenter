<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DateTimePicker;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TblSystemsoftware */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'สถานะ';
//$this->params['breadcrumbs'][] = ['label' => 'หน้าหลัก', 'url' => ['status']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>เพิ่มข้อมูลserver', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="box box-solid box-default">
    <div class="box-header">
        <h3 class="box-title">ระบบงาน</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
                    //'enableClientValidation' => true,
                    'options' => [
                        'id' => 'dynamic-form'
                    ]
        ]);
        \yii\bootstrap\BootstrapAsset::register($this);
        ?>

        <?= $form->field($model, 'status_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status_note')->textarea(['rows' => 6]) ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="box box-success">
        <div class="box-header"><i class="glyphicon glyphicon-oil"></i> </div>
        <div class="box-body">
            <?php ActiveForm::end(); ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'status_name',
                    'status_note',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{del}',
                        'buttons' => [
                            'del' => function($url, $model, $key) {
                                return '
                    <a data-method="POST" data-confirm="' . Yii::t('user', 'ยืนยันการสถานะ') . '" href="' . Url::to(['delstatus', 'id' => $model->id,]) . '">
                    <span title="' . Yii::t('user', 'Generate and send new password to user') . '" class="glyphicon glyphicon-trash">
                    </span></a>';
                            },
                        ],
                    ],
                ],
            ]);
            ?>
        </div>
    </div>

