<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SERVER';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tbl-serverall-index">

    <div class="col-lg-12 text-right">
        <p>
            <?php // Html::a('dashboard ', ['dashboard'], ['class' => 'btn btn-success']) ?>
            <?php //  Html::a('<span class="glyphicon glyphicon-pencil"></span>เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('ข้อมูลพื้นที', ['hardware'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('ข้อมูลโปรแกรม', ['detail'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\ActionColumn'],
        ['class' => 'yii\grid\SerialColumn'],
        //'chkstatus',
        [
            'attribute' => 'chkstatus',
            //'filter' => [0 => 'Inactive', 1 => 'Active'],//กำหนด filter แบบ dropDownlist จากข้อมูล array
            'format' => 'html',
            'value' => function($model, $key, $index, $column) {
                return $model->chkstatus == 1 ? "<i class=\"glyphicon glyphicon-ok\"></i>" : "<i class=\"glyphicon glyphicon-remove\"></i>";
            }
        ],
        //'IpServer',
        // 'hardware',
        //'status1.name',
        [
            'attribute' => 'status',
            'filter' => ArrayHelper::map(app\models\Status::find()->asArray()->all(), 'id', 'name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
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
        //'capacity.name',
        [
            'attribute' => 'IpServer', //your model attribute
            'format' => 'html',
            'value' => function ($model, $index, $column) {
                return $model->IpServer ?
                        Html::a(
                                $model->IpServer, //link text
                                ['server/view', 'id' => $model->IpServer], //link url to some route
                                [// link options
                            'title' => 'Go!',
                            'target' => '_blank'
                                ]
                        ) : 'no debug';
            }
        ],
        'mapWithWapple:ntext',
        'hardware:ntext',
        [
            'attribute' => 'server_type_id',
            'filter' => ArrayHelper::map(app\models\ServerType::find()->asArray()->all(), 'server_type_id', 'server_type_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
//'format' => 'html',
            'label' => 'ประเภทเครือข่าย',
            'value' => function($model) {
                return $model->server_type_id ? $model->servertype->server_type_name : $model->server_type_id;
            }
        ],
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
        [
            'attribute' => 'systemsoftware_id',
            'filter' => ArrayHelper::map(app\models\TblSystemsoftware::find()->asArray()->all(), 'id', 'systemname'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
//'format' => 'html',
            'label' => 'ชื่อระบบงาน',
            'value' => function($model) {
                
                
                return $model->systemsoftware_id ? 
                        $model->systemsoftware->systemname
//                         Html::a(
//                                $model->systemsoftware->systemname, //link text
//                                ['systemsoftware/view', 'id' => $model->systemsoftware_id], //link url to some route
//                                [// link options
//                            'title' => 'Go!',
//                            'target' => '_blank'
//                                ]
//                        )  
                        : $model->systemsoftware_id;
            }
        ],
        [
            'label' => 'service',
            'format' => 'raw',
            'value' => function ($model) {
                $str = '';
                $i = 1;
                foreach ($model->proDetail as $request) {
                    $r = $request->program;
                    $str .= $i . '.) ' . $r->name . ' ' . $r->version . '<br/>';
                    $i++;
                }

                return $str;
            },
        ],
        //'Description:ntext',
        [
            'attribute' => 'Description',
            'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
        ],
        'created_at',
            //'tool:ntext',
            //'servicePort:ntext',
            //'subnetMask:ntext',
            //'gateway:ntext',
            //'status:ntext',
            //'user:ntext',
            //'pw:ntext',
            //'userPwAnother:ntext',
            //'remak1:ntext',
            //'remark2:ntext',
            //'adminServer:ntext',
            //'created_by',
            //'updated_user',
    ];
    ?>

    <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax', 'timeout' => 5000]) ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before' => ' '
        ],
        'persistResize' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-hover ',
        ],
        'columns' => $gridColumns,
    ]);
    ?>






    <?php yii\widgets\Pjax::end() ?>
</div>
