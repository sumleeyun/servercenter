<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\websiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Websites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="website-index">



    <div class="col-lg-12 text-right">
        <p>
            <?= Html::a('เพิ่มเว็บไซต์', ['systemsoftware/create'], ['class' => 'btn btn-success']) ?>
            <?php // Html::a('โปรแกรม', ['status'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('capacity', ['capacity'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('moniter', ['moniter','ch' => '1'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax', 'timeout' => 5000]) ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\ActionColumn',
            'template'=>'<div class="btn-group btn-group-sm text-center"> {view} {update} </div>',
            
            ],
        ['class' => 'yii\grid\SerialColumn'],
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
                'url_perfix',
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
                                ['server/view', 'id' => $model->ipServer], //link url to some route
                                [// link options
                            'title' => 'Go!',
                            'target' => '_blank'
                                ]
                );
            }
        ],
        'server.mapWithWapple',
        'ipMapServer',
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
        'software',
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
</div>
