<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\TblSystemsoftware */

$this->title = $model->systemname;
$this->params['breadcrumbs'][] = ['label' => 'หน้าหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-systemsoftware-view">
    <div class="row">
        <div class="col-md-12 text-right">

            <p>
                <?= Html::a('เพิ่ม SERVER IP', ['/server/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('เพิ่ม WEB HOSTING', ['/website/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                <?= Html::a('update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                <?=
                Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">ข้อมูลระบบ</a></li>
            <li><a data-toggle="tab" href="#menu1">การติดตั้ง</a></li>
            <li><a data-toggle="tab" href="#menu2">SERVER</a></li>
            <li><a data-toggle="tab" href="#menu3">WEB Hosting</a></li>
            <li><a data-toggle="tab" href="#menu4">MA</a></li>

        </ul>
    </div>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'systemname',
                            'systemENG',
                            'unitrtaf.nameDepartment',
                            [
                                'label' => 'เจ้าหน้าที่ติดต่อ',
                                'format' => 'raw',
                                'value' => function($model) {
                                    if ($model->adminsys) {
                                        $contactName = $model->adminName->name;
                                        return $contactName;
                                    }
                                },
                            ],
                            //'adminName.name',
                            'company.company_nameT',
                            'system_dayjob',
                            'remak',
                        //'created_at',
                        //'created_by',
                        //'updated_at',
                        //'updated_by',
                        /* [
                          'attribute' => 'created_at',
                          'value' => Yii::$app->formatter->asDateTime($model->created_at, 'yyyy-MM-dd'),
                          ],
                          [
                          'attribute' => 'update_at',
                          'value' => Yii::$app->formatter->asDateTime($model->update_at, 'yyyy-MM-dd'),
                          ], */
                        ],
                    ])
                    ?>
                </div>
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title ">ทีมงาน</h3>
                    <div class="box-tools pull-right">

                        <?php // Html::button('<span class="glyphicon glyphicon-plus"></span> ', ['value' => Url::to(['teamwork']), 'class' => 'btn btn-success', 'id' => 'BtnModelTeamwork'])   ?>

                        <?=
                        Html::button('<span class="glyphicon glyphicon-share"></span>', [
                            'value' => Url::to(['teamwork', 'id' => $model->id]),
                            'class' => 'btn btn-primary',
                            'id' => 'BtnModalTeamwork',
                            'data-toggle' => "modal",
                            'data-target' => "#modalTeamwork",
                        ])
                        ?>

                        <?php
                        Modal::begin([
                            'header' => 'ทีมงาน List',
                            'id' => 'modalTeamwork',
                            'size' => 'modal-lg',
                            'class' => 'style=width:auto',
                            //keeps from closing modal with esc key or by clicking out of the modal.
                            // user must click cancel or X to close
                            'clientOptions' => ['backdrop' => 'static', 'keyboard' => false,],
                        ]);
                        echo "<div id='modalContentTeamwork'></div>";
                        Modal::end();
                        ?>
                    </div>



                </div>
                <div class="box-body">

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            //'system_id',
                            'admin.name',
                            'job_description',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{del}',
                                'buttons' => [
                                    'del' => function($url, $model, $key) {
                                        return '
                    <a data-method="POST" data-confirm="' . Yii::t('user', 'ยืนยันการลบทีมงาน') . '" href="' . Url::to(['delteamwork', 'id' => $model->id,]) . '">
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


            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title ">account</h3>
                    <div class="box-tools pull-right">

                        <?php // Html::button('<span class="glyphicon glyphicon-plus"></span> ', ['value' => Url::to(['teamwork']), 'class' => 'btn btn-success', 'id' => 'BtnModelTeamwork'])     ?>

                        <?=
                        Html::button('<span class="glyphicon glyphicon-share"></span>', [
                            'value' => Url::to(['account', 'id' => $model->id, 'chk' => 'ADD']),
                            'class' => 'btn btn-primary',
                            'id' => 'BtnModalAccount',
                            'data-toggle' => "modal",
                            'data-target' => "#modalAccount",
                        ])
                        ?>

                        <?php
                        Modal::begin([
                            'header' => 'ทีมงาน Account',
                            'id' => 'modalAccount',
                            'size' => 'modal-lg',
                            'class' => 'style=width:auto',
                            //keeps from closing modal with esc key or by clicking out of the modal.
                            // user must click cancel or X to close
                            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],
                        ]);
                        echo "<div id='modalContentAccount'></div>";
                        Modal::end();
                        ?>
                    </div>



                </div>
                <div class="box-body">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataSw,
                        //'filterModel' => $searchModel,
//                        'panel' => [
//                            'before' =>
//                             Html::button('<span class="glyphicon glyphicon-share"></span>', [
//                            'value' => Url::to(['account', 'id' => $model->id]),
//                            'class' => 'btn btn-primary',
//                            'id' => 'BtnModalAccount',
//                            'data-toggle' => "modal",
//                            'data-target' => "#modalAccount",
//                        ]),
//                            'type' => GridView::TYPE_PRIMARY,
//                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            'name',
                            'username',
                            'password',
                            //'block',
                            'note',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{del} ',
                                'buttons' => [
                                    'del' => function($url, $model, $key) {
                                        return '
                    <a data-method="POST" data-confirm="' . Yii::t('user', 'ยืนยันการลบทีมงาน') . '" href="' . Url::to(['account', 'id' => $model->id, 'chk' => 'DEL']) . '">
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


        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">ข้อมูลติดตั้ง</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'format' => 'raw',
                                'attribute' => 'photo',
                                'value' => Html::img($model->photoViewer, ['class' => 'img-thumbnail', 'style' => 'width:300px;height:300px;'])
                            ],
                            'room',
                            'u_no',
                            'rack',
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div>

        <div id="menu2" class="tab-pane fade">
            <div class="box box-success">
                <div class="box-header"><i class="glyphicon glyphicon-oil"></i> รายละเอียด Server

                    <div class="box-tools pull-right">

                        <?php // Html::button('<span class="glyphicon glyphicon-plus"></span> ', ['value' => Url::to(['teamwork']), 'class' => 'btn btn-success', 'id' => 'BtnModelTeamwork'])       ?>

                        <?=
                        Html::button('<span class="glyphicon glyphicon-share"></span>', [
                            'value' => Url::to(['teamwork', 'id' => $model->id]),
                            'class' => 'btn btn-primary',
                            'id' => 'BtnModalTeamwork',
                            'data-toggle' => "modal",
                            'data-target' => "#modalTeamwork",
                        ])
                        ?>
                    </div>


                </div>

                <div class="box-body">



                    <?=
                    GridView::widget([
                        'tableOptions' => [
                            'class' => 'table table-striped table-hover',
                            'width' => '100%',
                            'cellspacing' => '0'
                        ],
                        'dataProvider' => $dataProServer,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'IpServer',
                            [
                                'attribute' => 'IpServer', //your model attribute
                                'format' => 'raw',
                                'value' => function ($model, $index, $column) {
                                    return Html::a(
                                                    ' <span class="glyphicon glyphicon-eye-open"></span>' . $model->IpServer, //link text
                                                    ['server/view', 'id' => $model->IpServer], //link url to some route
                                                    [// link options
                                                'title' => 'แสดงserver',
                                                'target' => '_blank'
                                                    ]
                                    );
                                }
                            ],
                            'mapWithWapple',
                            'computerName',
                            'Description',
                            //'website.URL:URL',
                            //'admindetail.name',
                            //'TypeServer:ntext',
                            [
                                'label' => 'ระบบประฏิบัติการ',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    if ($model->proName) {
                                        $osname = $model->proName->name . ' ' . $model->proName->version;

                                        return $osname;
                                    }
                                },
                            ],
//                            'proName.name',
                            'cpu',
                            'memory',
                            'harddisk',
                            [
                                'label' => 'url',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $str = '';
                                    $i = 1;
                                    foreach ($model->website as $request) {
                                        if ($request->status == 1) {
                                            $urlx = $request->domainName;
//                                        $str .= $i . ').<a href=' . $request->URL . ' target=_blank>' . $request->URL . '</a><br/>';
                                            $str .= $i . '. ' . Html::a($urlx, $urlx, ['title' => 'Go!', 'target' => '_blank']
                                                    ) . '</br>';

                                            $i++;
                                        }
                                    }

                                    return $str;
                                },
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="box box-success">
                <div class="box-header"><i class="glyphicon glyphicon-oil"></i> WEB Hosting
                    <div class="box-tools pull-right">

                        <?php // Html::button('<span class="glyphicon glyphicon-plus"></span> ', ['value' => Url::to(['teamwork']), 'class' => 'btn btn-success', 'id' => 'BtnModelTeamwork'])       ?>

                        <?=
                        Html::button('<span class="glyphicon glyphicon-share"></span>', [
                            'value' => Url::to(['teamwork', 'id' => $model->id]),
                            'class' => 'btn btn-primary',
                            'id' => 'BtnModalTeamwork',
                            'data-toggle' => "modal",
                            'data-target' => "#modalTeamwork",
                        ])
                        ?>
                    </div>

                </div>
                <div class="box-body">
                    <?=
                    GridView::widget([
                        'tableOptions' => [
                            'class' => 'table table-striped table-hover',
                            'width' => '100%',
                            'cellspacing' => '0'
                        ],
                        'dataProvider' => $dataWebHosting,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'ipServer',
                            [
                                'label' => 'url',
                                'format' => 'raw',
                                'value' => function ($model) {

                                    return $model->domainName;
                                },
                            ],
                            'history3',
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-2">สถานะ:<?php //$model->status1->name;                     ?></div>
        <div class="col-md-2">ผู้ดูแล:<?php //echo $model->adminServer;                     ?></div>
        <div class="col-md-2">เจ้าหน้าที่สร้าง :<?php echo $model->created_by; ?></div>
        <div class="col-md-2">วันที่สร้าง :<?php echo $model->created_at; ?></div>        
        <div class="col-md-2">เจ้าหน้าที่แก้ไข :<?php echo $model->updated_by; ?></div>
        <div class="col-md-2">วันที่แก้ไข :<?php echo $model->updated_at; ?></div>      



    </div>






</div>
