<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ติดตามงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblwork-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Tblwork', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //['class' => 'yii\grid\ActionColumn'],
            [
                'attribute' => 'Status',
                'filter' => [ '1' => 'รอการดำเนินงาน', '2' => 'กำลังรอเจ้าของงาน', '3' => 'ปิดงาน','4'=>'ส่งเมล์ประสาน','5'=>'ทำหนังสือตอบกลับแล้ว'], //กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {

                    switch ($model->Status) {
                        case 1: return '<span class="label label-warning">กำลังดำเนินการ</span>';
                            break;
                        case 2: return '<span class="label label-info">รอติดต่อจากเจ้าของงาน</span>';
                            break;
                        case 3: return'<span class="label label-success">ปิดงาน</span>';
                            break;
                        case 4: return'<span class="label label-success">ส่งเมล์ประสาน</span>';
                            break;
                        case 5: return'<span class="label label-success">ทำหนังสือตอบกลับแล้ว</span>';
                            break;
                        default : return '<span class="label label-danger">อื่นๆ</span>';
                    }
                }
            ],
            'date_job',
            'eadmin_sn',
            'topic',
            //'server_ip',
            //'url_server:url',
            //'dep_id',
            //'systemsoftware.systemname',
            [
                'attribute' => 'server_ip', //your model attribute
                'format' => 'html',
                'value' => function ($model, $index, $column) {
                    return $model->server_ip ? Html::a(
                                    $model->systemsoftware->systemname, //link text
                                    ['work/view', 'id' => $model->id], //link url to some route
                                    [// link options
                                'title' => 'Go!',
                                'target' => '_blank'
                                    ]
                    ):'not null'
                            
                            ;
                    
                }
            ],
            'urlname.URL:url',
            //'department.nameDepartment',
            [
                'attribute' => 'Department',
                'label' => 'หน่วยงานเจ้าของงาน',
                'filter' => ArrayHelper::map(app\models\TblDepartment::find()->all(), 'codeDepartment', 'nameDepartment'),
                'value' => function($model) {

                    return $model->dep_id ? $model->department->nameDepartment : '- no debug -';
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],
            'note:ntext',
          
            //'Status',
            'updated_at',
                        'profile.name',
        //'created_at',
        //'created_by',
        //
        //['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
