<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\websiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'capacity';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="website-index">



    <div class="col-lg-12 ">
        <?= Html::a('website', ['index'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="col-lg-12">
        <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax', 'timeout' => 5000]) ?>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php
        $gridColumns = [
//        ['class' => 'yii\grid\ActionColumn',
//            'template'=>'<div class="btn-group btn-group-sm text-center"> {view} {update} </div>',
//            
//            ],




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
                'format' => 'raw',
                'value' => function($model) {
                    $lab = ' btn btn-success';
                    if (!empty($model->status1)) {

                        if ($model->status1->id == 3) {
                            $lab = ' btn btn-warning';
                        }
                        if ($model->status1->id == 2) {
                            $lab = 'btn btn-success';
                        }
                        if ($model->status1->id == 6) {
                            $lab = 'btn btn-danger';
                        }



                        return Html::a(Yii::t('app', ' {modelClass}', [
                                            'modelClass' => $model->status1->name,
                                        ]), ['addcapa', 'id' => $model->id], ['class' => $lab, 'id' => 'popupModal']);

                        ;
                    } else {

                        return $model->status;
                    }
                }
            ],
//        [
//            'label' => 'Domain Name',
//            'format' => 'raw',
//            'value' => function ($model, $index, $column) {
//                $urlx = $model->domainName;
//                return Html::a(
//                                $urlx, //link text
//                                $urlx, //link url to some route
//                                [// link options
//                            'title' => 'Go!',
//                            'target' => '_blank'
//                                ]
//                );
//            }
//        ],
            'url_perfix',
            'url_sub',
            'URL:url',
            'history3',
            //'short_remarks:ntext',
            //'ipServer'
            [
                'attribute' => 'ipServer', //your model attribute
                'format' => 'raw',
                'value' => function ($model, $index, $column) {
                    return Html::a(
                                    $model->ipServer, //link text
                                    ['server/view', 'id' => $model->ipServer], //link url to some route
                                    [// link options
                                'title' => 'Go!',
                                'target' => '_blank'
                                    ]
                    );
                }
            ],
//        'server.mapWithWapple',
//        'ipMapServer',
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
                        'program.name',
                //'adminDetail',
                //'admindetail.name',                  
//        'software',
                //'software_detail',
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
                //'modified_by',
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



        <?php
        yii\bootstrap\Modal::begin(['id' => 'modal']);
        yii\bootstrap\Modal::end();



        $this->registerJs("$(function() {
   $('#popupModal').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('.modal-content')
     .load($(this).attr('href'));
   });
});");
        ?>
    </div>
</div>
