<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\websiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'โปรแกรมที่ใช้';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="website-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('WEBSITE', ['website/index'], ['class' => 'btn btn-success']) ?>
        <?php // Html::a('status', ['status'], ['class' => 'btn btn-success']) ?>
    </p>

   <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax', 'timeout' => 5000]) ?>

    <?php //  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $gridColumns = [
       ['class' => 'yii\grid\ActionColumn'],
        ['class' => 'yii\grid\SerialColumn'],
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
                if (!empty($model->status1)){
                    
                if($model->status1->id == 3 ){$lab = 'label-danger'; }   
                if($model->status1->id == 2 ){$lab = 'label-warning'; }
                if($model->status1->id == 6 ){$lab = 'label-danger'; }
                
                return  '<span class="label '.$lab .'"> '.$model->status1->name.' </span>'; 
                }else{
                    
                    return $model->status ;
                    
                }
            }
        ],
        [
            'label' => 'Domain Name',
            'format' => 'raw',
            'value' => function ($model, $index, $column) {
                $urlx = $model->domainName;
                return Html::a(
                                $urlx, //link text
                                $urlx, //link url to some route
                                [// link options
                            'title' => 'Go!',
                            'target' => '_blank'
                                ]
                );
            }
        ],
        //'URL:url',
        'history3',
        //'short_remarks:ntext',
        //'ipServer'
        [
            'attribute' => 'ipServer', //your model attribute
            'format' => 'raw',
            'value' => function ($model, $index, $column) {
                return Html::a(
                                $model->ipServer, //link text
                                ['server/update', 'id' => $model->ipServer], //link url to some route
                                [// link options
                            'title' => 'Go!',
                            'target' => '_blank'
                                ]
                );
            }
        ],
        'server.mapWithWapple',
        //'ipMapServer',
        //'history1',
        //'history2',
        //'department.nameDepartment',
        [
            'attribute' => 'Department',
            'label' => 'ชื่อสังกัด',
            'filter' => ArrayHelper::map(app\models\TblDepartment::find()->asArray()->all(), 'codeDepartment', 'nameDepartment'),
            'value' => function($model, $index, $column) {

                return $model->department ? $model->department->nameDepartment : '- no debug -';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
        ],
        //'adminDetail',
        //'admindetail.name',                  
        //'software',
                    [
            'attribute' => 'program_id',
            'filter' => ArrayHelper::map(app\models\program::find()->select(['id','concat(name,version) as nameall'])->asArray()->all(), 'id', 'nameall'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
            //'format' => 'html',
            'label' => 'โปรแกรม',
            //'contentOptions' => ['style' => 'width:400px;'],
            'value' => function($model) {
                //return $model->program_id ? $model->program->name : $model->program_id;
                return empty($model->program_id) ? null : $model->program->name.' '.$model->program->version;
            }
        ],
                    
        

            'software_detail',
            //'userweb',
            //'pwdweb',
            //'userFtp',
            //'pwdFtp',
            //'dbName',
            //'userDb',
            //'pwdDb',
            //'created',
            //'created_by',
            //'modified',
                 [
                     'attribute' => 'modified',
                    'label' => 'วันที่แก้ไข',
//                    'value' => 'userUpdated.name',
                    
                ],
                [
                    'label' => 'เจ้าหน้าที่แก้ไข',
                    'value' => 'userUpdated.name',
                    
                ],
            //'userUpdated.name',
    ];
    ?>

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
