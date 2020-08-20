<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblworks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblwork-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'server_ip',
            //'url_server:url',
            //'dep_id',
           'urlname.URL:url',
            //'department.nameDepartment',
            [
                'attribute' => 'Department',
                'label' => 'หน่วยงานเจ้าของงาน',
                'filter' => ArrayHelper::map(app\models\TblDepartment::find()->asArray()->column(), 'codeDepartment', 'nameDepartment'),
                'value' => function($model) {
                
                return $model->dep_id ? $model->department->nameDepartment : '- no debug -';
                
                    
                    
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],
            
            
            'eadmin_sn',
            //'note:ntext',
            'date_job',
            //'Status',
            
            [
                'attribute' => 'Status',
                'filter' => [1 => 'กำลังดำเนินการ', 2 => 'รอติดต่อจากเจ้าของงาน', 3 => 'ปิดงาน'], //กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {

                    switch ($model->Status) {
                        case 1: return '<span class="label label-warning">กำลังดำเนินการ</span>';
                            break;
                        case 2: return '<span class="label label-info">รอติดต่อจากเจ้าของงาน</span>';
                            break;
                        case 3: return'<span class="label label-success">ปิดงาน</span>';
                            break;
                       
                        default : return '<span class="label label-danger">อื่นๆ</span>';
                    }
                }
            ],
            'updated_at',
            //'created_at',
            //'created_by',
                    

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
