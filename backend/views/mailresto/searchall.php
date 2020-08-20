<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\behaviors\TimestampBehavior;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel app\models\mailrestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'mail restore';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mailresto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


    <?= Html::a('Dashboard', ['index'], ['class' => 'btn btn-success']) ?> <?= Html::a('Create Mail restore', ['create'], ['class' => 'btn btn-success']) ?> 


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'hover' => true,
        //'tableOptions'=>['class'=>'table table-bordered table-striped dataTable table-hover'],
        //'resizableColumns'=>true,
        'persistResize' => true,
        
        //'panel ' => [
        //    'heading'=>'<h1>'.Html::encode(mb_strtoupper($this->title)).'</h1>', 
        //],
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'beforeGrid' => 'My fancy content before.',
            'afterGrid' => 'My fancy content after.',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'email',
            'dbmail',
            'dbff',
            [
                'attribute' => 'status',
                'filter' => [0 => 'Not restore', 1 => 'Yes restore'], //กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {
                    return $model->status == 0 ? '<i class="glyphicon glyphicon-remove"></i> <span class="text-danger">Not restore</span>' : '<i class="glyphicon glyphicon-ok"></i> <span class="text-success">YES restore</span>';
                }
            ],
            /*  [
              'class' => 'kartik\grid\EditableColumn',
              'filter' => ['สมบูรณ์' => 'สมบูรณ์', 'ไม่มีการตอบเมล์' => 'ไม่มีการตอบเมล์'],
              'header' => 'note',
              'attribute' => 'note',
              'value' => function($model) {
              return $model->note;
              }], */
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'note',
                'pageSummary' => true,
                'readonly' => false,
                'value' => function($model){ return $model->note; }, // assign value from getProfileCompany method
                'editableOptions' => [
                    'header' => 'note',
                    'inputType' => kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => [
                        ]
                    ]
                ],
            ],
            //'note',                   
            'name_by',
            //'user_create',
            [
                'header' => 'วันที่ อัพเดต',
                'attribute' => 'create_y', 'format' => 'html', 'value' => function($model, $key, $index, $column) {
                    return Yii::$app->formatter->asDate($model->create_y, 'medium'); //short,medium,long,full
                    //return Yii::$app->formatter->asDateTime($model->created_at,'medium');
                }],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]);
    ?>


</div>
