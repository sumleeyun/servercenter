<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\helpers\Json;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'โปรแกรมติดตั้ง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-serverall-index">


    <p>
        <?= Html::a('ข้อมูล sever ทั้งหมด ', ['server/index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax', 'timeout' => 5000]) ?>


    


    <?php
    $gridColumns2 = [
        ['class' => 'yii\grid\SerialColumn'],
        'ipaddress',
        'serverDetail.hardware',
        [
            //'attribute' => 'program_id',
            'filter' => ArrayHelper::map(app\models\TblServerall::find()->select(['IpServer', 'IpServer'])->where(['server_type_id'=>'2'])->asArray()->all(), 'IpServer', 'IpServer'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
            //'format' => 'html',
            'label' => 'vCenter',
            //'contentOptions' => ['style' => 'width:400px;'],
            'value' => function($model) {
                //return $model->program_id ? $model->program->name : $model->program_id;
                return empty($model->serverDetail) ? null : $model->serverDetail->hardware;
            }
        ],
        [
            'attribute' => 'program_id',
            'filter' => ArrayHelper::map(app\models\program::find()->select(['id','concat(name,version) as nameall'])->asArray()->all(), 'id', 'nameall'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
            //'format' => 'html',
            'label' => 'service',
            //'contentOptions' => ['style' => 'width:400px;'],
            'value' => function($model) {
                //return $model->program_id ? $model->program->name : $model->program_id;
                return empty($model->program_id) ? null : $model->program->name.' '.$model->program->version;
            }
        ],
        //'program.version',
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
            'template' => '{del}',
            'buttons' => [
                'del' => function($url, $model, $key) {
                    return '
                    <a data-method="POST" data-confirm="' . Yii::t('user', 'ยืนยันการลบ') . '" href="' . Url::to(['delsw', 'id' => $model->id,]) . '">
                    <span title="' . Yii::t('user', 'Generate and send new password to user') . '" class="glyphicon glyphicon-trash">
                    </span></a>';
                },
            ],
        ],
    ];
    ?>


    <?=
    GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'persistResize' => true,
    'pjax' => true,
    'pjaxSettings' => [
    'neverTimeout' => true,
    ],
    'tableOptions' => [
    'class' => 'table table-striped table-hover ',
    ],
    'columns' =>$gridColumns2,
    ]);
    ?>
    <?php yii\widgets\Pjax::end() ?>
</div>
