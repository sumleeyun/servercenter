<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\helpers\Json;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

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
    $gridColumns1 = [
        //['class' => 'yii\grid\ActionColumn'],
        ['class' => 'yii\grid\SerialColumn'],
        //'IpServer',
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
        //'mapWithWapple:ntext',
        //'TypeServer:ntext',
        //'OS:ntext',
        //'program:ntext',
        'computerName:ntext',
        'hardware:ntext',
        /* [
          'attribute' => 'hardware',
          'filter' => app\models\vcenterhosts::find()->select(['hardware'])->column(), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
          //'format' => 'html',
          'label' => 'VCENTER',
          'value' => function($model) {
          return $model->hardware ? $model->hardware :""  ;
          }

          ], */
        //'vcenterhosts.ip',
        'systemsoftware.systemname',
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
            // 'Description:ntext',
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


    <?php
    $gridColumns2 = [
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
    //'filterModel' => $searchModel,
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
