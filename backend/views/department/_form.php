<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TblDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'codeDepartment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nameDepartment')->textInput(['maxlength' => true])->label('ชื่อหน่วยงาน') ?>
    <?= $form->field($model, 'initials')->textInput(['maxlength' => true])->label('ตัวย่อ') ?>
    <div class="row">
        <div class="col-sm-6" >

            <?php
            $dataCom = \app\models\Components::find()->select(['nameComponents', 'code'])->indexBy('code')->column();

            echo $form->field($model, 'codeComponents')->widget(Select2::classname(), [
                'data' => $dataCom,
                'options' => ['placeholder' => 'Select ส่วนราชการ ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>


        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" >

            <?php
            $datadep = \app\models\TblDepartment::find()->select(['nameDepartment', 'codeDepartment'])->indexBy('codeDepartment')->column();

            echo $form->field($model, 'under')->widget(Select2::classname(), [
                'data' => $datadep,
                'options' => ['placeholder' => 'Select หน่วยขึ้นตรง ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>      
        <div class="col-sm-6" >

            <?php //Html::a('', ['/components/create'], ['class' => 'glyphicon glyphicon-pencil'], ['target' => '_blank'], [''])  ?>
            <p>
                <?=
                Html::button('<span class="glyphicon glyphicon-share"></span>', [
                    'value' => Url::to(['/components/create']),
                    'class' => 'btn btn-success',
                    'id' => 'BtnModalComp',
                    'data-toggle' => 'modal',
                    'data-target' => '#modalComp'
                ])
                ?>

            </p>

            <?php
            Modal::begin([
                //'headerOptions' => ['id' => 'modalHeader'],
                'header' => '<h4>' . $this->title . '</h4>',
                'id' => 'modalComp',
                'size' => 'modal-md',
                    //keeps from closing modal with esc key or by clicking out of the modal.
                    // user must click cancel or X to close
                    //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
            echo "<div id='modelContent'></div>";
            Modal::end();
            ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>





