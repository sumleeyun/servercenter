<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\support_service_typeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประเภทงานบริการ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-service-type-index">

    <h1><?php //  Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php // Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', ' สร้างประเภทงาน'), ['create'], ['class' => 'btn btn-default']) ?>
        
                        <?=
            Html::button('<span class="glyphicon glyphicon-plus"></span>', [
                'value' => Url::to(['create', 'ch' => 'create']),
                'class' => 'btn btn-primary',
                'id' => 'BtnModaltype',
                'data-toggle' => "modal",
                'data-target' => "#modalServiceType",
            ])
            ?>
            
    </div>


    <?php
    Modal::begin([
        'header' => 'ประเภทงานบริการ',
        'id' => 'modalServiceType',
        'size' => 'modal-lg',
        'class' => 'style=width:auto'
    ]);
    echo "<div id='modalContentServiceType'></div>";
    Modal::end();
    ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type_id',
            'type_name',
            'type_notes',
            'active',
[
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                // uncomment below and comment detail if you need to render via ajax
                // 'detailUrl'=>Url::to(['/site/_detail']),
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new app\models\support_service_suptypeSearch();
                    $typeid = $model->type_id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 2, 2);
                    $dataProvider->query->where(['type_id' => $typeid]);
                    return Yii::$app->controller->renderPartial('_detail.php', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider,]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                //'expandOneOnly ' => true
            ],
            
            
            
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
