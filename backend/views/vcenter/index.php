<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลVMWARE';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcenterhosts-index">



    <p>
        <?php // Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        //'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        //'headerOptions' => ['class' => 'kartik-sheet-style'],
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],
            //['class' => 'kartik\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            //'server_id',
            [
                'attribute' => 'server_id', //your model attribute
                'format' => 'raw',
                'value' => function ($model, $index, $column) {
                    return Html::a(
                                    $model->server_id, //link text
                                    ['server/view', 'id' => $model->server_id], //link url to some route
                                    [// link options
                                'title' => 'รายละเอียด',
                                'target' => '_blank'
                                    ]
                    );
                }
            ],
            'model',
            'cpu',
            'memory',
            'license',
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                // uncomment below and comment detail if you need to render via ajax
                // 'detailUrl'=>Url::to(['/site/_detail']),
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new \app\models\vcenterhostsSearch();
                    $vc_id = $model->server_id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 2, 2);
                    $dataProvider->query->where(['server_id' => $vc_id]);
                    return Yii::$app->controller->renderPartial('_detail.php', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider,]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                //'expandOneOnly ' => true
            ],
        ],
    ]);
    ?>
</div>
