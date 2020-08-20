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
/* @var $model app\models\TblServerall */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-serverall-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
         <div class="box box-solid box-default">
            <div class="box-header">
                <h3 class="box-title">ระบบงาน</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
        <div class="col-md-12">
                    <?php
                    //$datasys = app\models\TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column();

                    echo $form->field($model, 'systemsoftware_id')->widget(Select2::classname(), [
                        'data' => $model->getSystem($system_id),
//                        'options' => ['placeholder' => 'Select ระบบงาน ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('เลือกระบบงาน ');
                    ?>
                </div>
                 <div class="col-md-4"><?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?></div>
            </div>
           
         </div>
        <div class="col-md-4">
            <div class="box box-solid box-info">
                <div class="box-header">
                    <h3 class="box-title">NETWORK</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'IpServer')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'mapWithWapple')->textInput() ?>     
                    <?= $form->field($model, 'subnetMask')->textInput() ?>
                    <?= $form->field($model, 'gateway')->textInput() ?>
                    <?= $form->field($model, 'computerName')->textInput() ?>

                </div><!-- /.box-body -->
            </div>
        </div>


        <div class="col-md-4">
            <div class="box box-solid box-info">
                <div class="box-header">
                    <h3 class="box-title">ระบบปฏิบัติการ</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   

                    <?php
                    //$servertype = app\models\ServerType::find()->select(['server_type_name', 'server_type_id'])->indexBy('server_type_id')->column();

                    echo $form->field($model, 'server_type_id')->widget(Select2::classname(), [
                        'data' => $model->type,
                        'options' => ['placeholder' => 'เลือกประเภท ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                
                    
                    
                    <?php
//                    echo $form->field($model, 'OS')->dropDownList([
//                        'windows  10' => 'windowns10',
//                        'windows  server 2003' => 'windows  server 2003',
//                        'windows  server 2008 R2 Standard' => 'windows  server 2008 R2 Standard',
//                        'windows  server 2008' => 'windows  server 2008',
//                        'windows  server 2012' => 'windows  server 2012',
//                        'windows  server 2012 R2' => 'windows  server 2012 R2',
//                        'windows  server 2016 R2' => 'windows  server 2016 R2',
//                        'windows  server 2019 standard' => 'windows  server 2019 standard',
//                        'CentOS' => 'CentOS/7/8/9',
//                        'ubuntu ' => 'ubuntu /10/12/14/16',
//                        'Scientific Linux ' => 'Scientific Linux',
//                        'Redhat Linux' => 'Redhat Linux',
//                        'VMware ESXi5.0' => 'VMware ESXi5.0',
//                        'VMware ESXi5.5' => 'VMware ESXi5.5',
//                        'VMware ESXi6.0' => 'VMware ESXi6.0',
//                            ], ['prompt' => ' เลือกระบบปฏิบัติการ']
//                    );
//                    
                    
                    ?>
                   

                    
                     <?php
                     if($model->OS){
                     echo '<p>'.$model->OS.'</p>';
                    //$datasys = app\models\TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column();
                     }
                    echo $form->field($model, 'OS')->widget(Select2::classname(), [
                        'data' => $model->listOs,
                        'options' => ['placeholder' => 'ระบบปฏิบัติการ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('เลือกระบบปฏิบัติการ ');
                    ?>
                    <?= $form->field($model, 'user')->textInput() ?>

                    <?= $form->field($model, 'pw')->textInput() ?>

                    <?= $form->field($model, 'userPwAnother')->textInput() ?>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <div class="col-md-4">
            <div class="box box-solid box-info">
                <div class="box-header">
                    <h3 class="box-title">สถานะ</h3>
                <div class="box-tools pull-right">

                        <?php // Html::button('<span class="glyphicon glyphicon-plus"></span> ', ['value' => Url::to(['teamwork']), 'class' => 'btn btn-success', 'id' => 'BtnModelTeamwork']) ?>
<?= Html::a('<span class="glyphicon glyphicon-share"></span>', ['status'], ['class' => 'btn btn-success']) ?>
                        <?php /*
                        Html::button('<span class="glyphicon glyphicon-share"></span>', [
                            'value' => Url::to(['status']),
                            'class' => 'btn btn-primary',
                            //'id' => 'BtnModalStatus',
                            //'data-toggle' => "modal",
                            //'data-target' => "#modalStatus",
                        ])
                       */ ?>
                    </div>


                    <?php
                    Modal::begin([
                        'header' => 'ทีมงาน List',
                        'id' => 'modalStatus',
                        'size' => 'modal-lg',
                        'class' => 'style=width:auto'
                    ]);
                    echo "<div id='modalContentStatus'></div>";
                    Modal::end();
                    ?>

                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'chkstatus')->radioList(array('1' => 'ตรวจสอบแล้ว')); ?>

                    <?php
                   // $status = $model->StatusList;
                     echo $form->field($model, 'status')->widget(Select2::classname(), [
                        'data' => $model->statusList,
                        //'options' => ['placeholder' => 'Select Admin ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('สถานะ');
                    ?>   


                    <?php // $form->field($model, 'adminServer')->textInput() ?>
                    <?php
                    //$dataAdmin = app\models\AdminDetail::find()->select(['name', 'id'])->indexBy('id')->column();

                    echo $form->field($model, 'adminServer')->widget(Select2::classname(), [
                        'data' => $model->admin,
                        'options' => ['placeholder' => 'Select Admin ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('เจ้าหน้าที่ดูแล');
                    ?>


                    <?php // $form->field($model, 'created_by')->textInput() ?>

                    <?=
                    $form->field($model, 'created_at')->widget(
                            DateTimePicker::className(), [
                        'language' => 'th',
                        'options' => ['placeholder' => 'Select issue date ...'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii:ss',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                    
                    <?=
                    $form->field($model, 'updated_at')->widget(
                            DateTimePicker::className(), [
                        'language' => 'th',
                        'options' => ['placeholder' => 'Select issue date ...'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii:ss',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>

                    <div class="input-group">
                        <?= $form->field($model, 'created_by')->textInput() ?>
                        <span class="input-group-btn">
                            <?=
                            Html::button('<span class="glyphicon glyphicon-user"></span> ' , [
                                'value' => Yii::$app->urlManager->createUrl('/admindetail/index'),
                                'class' => 'btn btn-default',
                                'id' => 'BtnModalId',
                                //'data-toggle' => 'modal',
                                //'data-target' => '#modal',
                            ])
                            ?>
                        </span>

                    </div><!-- /input-group -->


                    <?php
                    Modal::begin([
                        'header' => 'your-header',
                        'id' => 'modal',
                        'size' => 'modal-md',
                    ]);

                    echo "<div id='modalContent'> ";
                    //echo  \Yii::$app->view->render('/admindetail/index',['dataProvider'=> $dataAdmin,'searchModel'=> null]);
                    //Modal::getContent('/admindetail/index');

                    echo "</div>";


                    Modal::end();
                    ?>


                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

    </div>
    <div class="roll">

        <div class="box box-solid box-default">
            <div class="box-header">
                <h3 class="box-title">HARDWARE</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="col-md-3"> <?php // $form->field($model, 'hardware')->textInput()    ?>

                     <?php
                    $datavcenter = app\models\TblServerall::find()->select(['IpServer', 'IpServer'])->where(['server_type_id'=>'2'])->indexBy('IpServer')->column();

                    echo $form->field($model, 'hardware')->widget(Select2::classname(), [
                        'data' => $datavcenter,
                        'options' => ['placeholder' => 'Select  VCENTER ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    
                    
                    <?php /*
                    echo $form->field($model, 'hardware')->dropDownList([
                        'BaseServer' => 'BaseServer',
                        '10.107.0.84' => '10.107.0.84',
                        '10.107.0.223' => '10.107.0.223',
                        '10.229.4.31' => '10.229.4.31',
                        '10.229.5.130' => '10.229.5.130',
                        '10.235.0.130' => '10.235.0.130',
                            ], ['prompt' => ' เลือก Hardware ']
                    );*/
                    ?>

                </div>


                <div class="col-md-3"> <?php // $form->field($model, 'vmhost_id')->textInput()    ?>

                    <?php 
                    $datavhosts = app\models\vcenterhosts::find()->select(['ip', 'id'])->indexBy('id')->column();

                    echo $form->field($model, 'vmhost_id')->widget(Select2::classname(), [
                        'data' => $datavhosts,
                        'options' => ['placeholder' => 'Select hosts VM WARE ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                </div>

                <div class="col-md-4"> <?= $form->field($model, 'model')->textInput()->hint("EX.HP Proliant BL460c G6") ?></div>
                <div class="col-md-3"> <?= $form->field($model, 'cpu')->textInput() ?></div>
                <div class="col-md-3"> <?= $form->field($model, 'memory')->textInput() ?></div>
                <div class="col-md-3"> <?= $form->field($model, 'harddisk')->textInput() ?></div>

            </div>
        </div>



        <div class="box box-solid box-default">
            <div class="box-header">
                <h3 class="box-title">อื่นๆ</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <div class="col-md-6"> <?= $form->field($model, 'program')->textInput() ?></div>

                <div class="col-md-3"><?= $form->field($model, 'tool')->textInput() ?></div>
                <div class="col-md-3"> <?= $form->field($model, 'servicePort')->textInput() ?></div>
                

                <div class="col-md-6"><?= $form->field($model, 'remak1')->textarea(['rows' => 6]) ?></div>

                <div class="col-md-6"><?= $form->field($model, 'remark2')->textarea(['rows' => 6]) ?></div>

            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div>  


    <div class="row">

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

