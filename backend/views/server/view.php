<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\TblServerall */

$this->title = $model->IpServer;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Serveralls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-serverall-view">

    <div class="col-md-12 text-right">


<?= Html::a('กลับไประบบงาน', ['systemsoftware/view', 'id' => $model->systemsoftware_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->IpServer], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->IpServer], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>

    </div>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">รายละเอียดระบบ</a></li>
        <li><a data-toggle="tab" href="#menu1">hardware</a></li>
        <li><a data-toggle="tab" href="#menu2">โปรแกรม/Account</a></li>
        <li><a data-toggle="tab" href="#menu3">website</a></li>
        <li><a data-toggle="tab" href="#menu4">Access route</a></li>

    </ul>


    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'systemsoftware.systemname',
                    'Description:ntext',
                    'computerName',
                    'IpServer',
                    'mapWithWapple',
                    'subnetMask:ntext',
                    'gateway:ntext',
                    //'proName.name',
                    [
                        'label' => 'ระบบประฏิบัติการ',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if ($model->proName) {
                                $osname = $model->proName->name . ' ver. ' . $model->proName->version;

                                return $osname;
                            }
                        },
                    ],
                    'user:ntext',
                    'pw:ntext',
                    'userPwAnother',
                    'servicePort:ntext',
                ],
            ])
            ?>


            <div class="box box-solid box-info">
                <div class="box-header">
                    <h3 class="box-title">อืนๆ</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'remak1:ntext',
        'remark2:ntext',
    ],
])
?>
                </div>

            </div>
        </div>

        <div id="menu1" class="tab-pane fade">
            <div class="box box-success">
                <div class="box-header text-right">

                </div><!-- /.box-header -->
                <div class="box-body">
<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'TypeServer',
        'servertype.server_type_name',
        'hardware',
        'vmhost_id',
        'model',
        'cpu',
        'memory',
        'harddisk',
    ],
])
?>
                </div>
            </div>
        </div>
        <!--  โปรแกรม -->
        <div id="menu2" class="tab-pane fade">
            <div class="box box-success">
                <div class="box-header text-right">
                    <!--h3 class="box-title">อืนๆ</h3-->
<?php
// tab โปรแกรมที่ติดตั้ง
// Html::button('<span class="glyphicon glyphicon-plus"></span> ', ['value' => Url::to(['teamwork']), 'class' => 'btn btn-success', 'id' => 'BtnModelTeamwork']) 
?>

                    <?=
                    Html::button('<span class="glyphicon glyphicon-share"></span>', [
                        'value' => Url::to(['software', 'id' => $model->IpServer]),
                        'class' => 'btn btn-primary',
                        'id' => 'BtnModalSoftware',
                        'data-toggle' => "modal",
                        'data-target' => "#modalSoftware",
                    ])
                    ?>
                </div><!-- /.box-header -->
                <div class="box-body">


<?=
GridView::widget([
    'dataProvider' => $dataProviderProgram,
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'program.name',
        'program.version',
        'program.port',
        //'usersystem_id',
        /* [
          'attribute' => 'usersystem_id',

          //'format' => 'html',
          'label' => 'account',
          'value' => function($model) {
          return $model->usersystem_id ?  $model->account->username." :pass:".$model->account->password : $model->usersystem_id  ;
          }
          ], */
        //'usersystem_id',
        'account.username',
        'account.password',
        'accessRoute',
        'note',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{del}',
            'buttons' => [
                'del' => function($url, $model, $key) {
                    return '
                                            <a data-method="POST" data-confirm="' . Yii::t('user', 'ยืนยันการลบ') . '" href="' . Url::to(['delsw', 'id' => $model->id, 'chk' => 'PROGRAM']) . '">
                                            <span title="' . Yii::t('user', 'Generate and send new password to user') . '" class="glyphicon glyphicon-trash">
                                            </span></a>';
                },
            ],
        ],
    ],
]);
?>

                    <?php
                    Modal::begin([
                        'header' => 'sotfware List',
                        'id' => 'modalSoftware',
                        'size' => 'modal-lg',
                        'class' => 'style=width:auto'
                    ]);
                    echo "<div id='modalContentSoftware'></div>";
                    Modal::end();
                    ?>
                </div>
            </div>
        </div>


        <!--  website -->
        <div id="menu3" class="tab-pane fade">
            <div class="box box-success">
                <div class="box-header text-right">
                    <!--h3 class="box-title">อืนๆ</h3-->
<?php
// tab website
// Html::button('<span class="glyphicon glyphicon-plus"></span> ', ['value' => Url::to(['teamwork']), 'class' => 'btn btn-success', 'id' => 'BtnModelTeamwork']) 
?>

                    <?=
                    Html::button('<span class="glyphicon glyphicon-share"></span>', [
                        'value' => Url::to(['website', 'id' => $model->IpServer]),
                        'class' => 'btn btn-primary',
                        'id' => 'BtnModalWebsite',
                        'data-toggle' => "modal",
                        'data-target' => "#modalWebsite",
                    ])
                    ?>
                </div><!-- /.box-header -->
                <div class="box-body">


<?=
GridView::widget([
    'dataProvider' => $dataProviderWebsite,
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'สถานะ',
            'format' => 'html',
            'value' => function($model) {
                $lab = 'label-success';
                if (!empty($model->status1)) {

                    if ($model->status1->id == 3) {
                        $lab = 'label-danger';
                    }
                    if ($model->status1->id == 2) {
                        $lab = 'label-warning';
                    }
                    if ($model->status1->id == 6) {
                        $lab = 'label-danger';
                    }

                    return '<span class="label ' . $lab . '"> ' . $model->status1->name . ' </span>';
                } else {

                    return $model->status;
                }
            }
        ],
        'domainName:url',
        'history3',
        [
            'class' => 'yii\grid\ActionColumn',
            'buttonOptions' => ['class' => 'btn btn-default'],
            'template' => '<div class="btn-group btn-group-sm text-center" role="group">{update} {delete} </div>',
            'options' => ['style' => 'width:150px;'],
            'buttons' => [
                'delete' => function($url, $model, $key) {
                    return '
                    <a data-method="POST" data-confirm="' . Yii::t('user', 'ยืนยันการลบ') . '" href="' . Url::to(['delsw', 'id' => $model->id, 'chk' => 'WEBSITE']) . '">
                    <span title="' . Yii::t('user', 'Generate and send new password to user') . '" class="glyphicon glyphicon-trash">
                    </span></a>';
                },
                'update' => function($url, $model, $key) {
                    return '
                     <a data-method="POST" href="' . Url::to(['website/update', 'id' => $model->id]) . '"><span  class="glyphicon glyphicon-edit"></span></a>';
                },
            ],
        ],
    ],
]);
?>

                    <?php
                    Modal::begin([
                        'header' => 'website List',
                        'id' => 'modalWebsite',
                        'size' => 'modal-lg',
                        'class' => 'style=width:auto'
                    ]);
                    echo "<div id='modalContentWebsite'></div>";
                    Modal::end();
                    ?>
                </div>
            </div>
        </div>

        <div id="menu4" class="tab-pane fade">
            <div class="box box-success">
                <div class="box-header text-right">

                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul>
                        <li>Remote Desktop</li>
                        <li>Cyper cyberark</li>
                        <li>ssh and telnet </li>
                    </ul>
                </div>
            </div>
        </div>
        <p></p>
        <p></p>

        <div class="row">

            <div class="col-md-2"><h4>สถานะ:<span class="label <?php
                    if ($model->status1->id == 6) {
                        echo "label-danger";
                    } else {
                        echo "label-primary";
                    }
                    ?>"><?php echo $model->status1->name; ?></span></h1></div>
            <div class="col-md-2">ผู้ดูแล:<?php echo $model->adminServer; ?></div>
            <div class="col-md-2">เจ้าหน้าที่สร้าง :<?php
                if ($model->created_by) {
                    echo $model->userCreated->name;
                }
                ?></div>
            <div class="col-md-2">วันที่สร้าง :<?php echo $model->created_at; ?></div>        
            <div class="col-md-2">เจ้าหน้าที่แก้ไข :<?php
                if ($model->updated_by) {
                    echo $model->userUpdated->name;
                }
                ?></div>
            <div class="col-md-2">วันที่แก้ไข :<?php echo $model->updated_at; ?></div>      



        </div>


    </div>