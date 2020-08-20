<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\support_serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กรอกงานเข้าระบบ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-service-index">

    <h1><?php //  Html::encode($this->title)      ?></h1>



    <p>
        <?php // Html::a('Create Support Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_subtype', ['model' => $searchModel, 'action' => 'add']); ?>

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title ">งานบริการ</h3>

            <div class="box-tools pull-right">
                 <?php
//                        Html::button('<span class="glyphicon glyphicon-plus"></span>', [
//                            'value' => Url::to(['subtype','id'=> $searchModel->type_id]),
//                            'class' => 'btn btn-primary',
//                            'id' => 'BtnModalSubtype',
//                            'data-toggle' => "modal",
//                            'data-target' => "#modalSubType",
//                        ])
//                        ?>
                    </div>


                    <?php
//                    Modal::begin([
//                        'header' => $searchModel->type_name,
//                        'id' => 'modalServiceSubtype',
//                        'size' => 'modal-lg',
//                        'class' => 'style=width:auto'
//                    ]);
//                    echo "<div id='modalContentServiceSubtype'></div>";
//                    Modal::end();
//                    ?>
            </div>
        
            
            <div class="box-body">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\ActionColumn',
                            
                            'template' => '{add}',
                            'buttons' => [
                                'add' => function($url, $model, $key) {
                                    return '
                                            <a data-method="POST" href="' . Url::to(['create', 'id' => $model->subtype_id]) . '">
                                            <span title="' . Yii::t('user', 'Generate and send new password to user') . '" class="glyphicon glyphicon-pencil">
                                            </span>work</a>';
                                },
                            ],
                        ],
                        ['class' => 'yii\grid\SerialColumn'],
                        
//            'type_id',
//            [
//            'attribute' => 'type_id',
//            'label' => 'ประเภทงาน',
//            'filter' => ArrayHelper::map(app\models\support_service_type::find()->asArray()->all(), 'type_id', 'type_name'),
//            'value' => function($model, $index, $column) {
//
//                return $model->type_id ? $model->type->type_name : '- no debug -';
//            },
//            'filterType' => GridView::FILTER_SELECT2,
//            'filterWidgetOptions' => [
//                'options' => ['prompt' => ''],
//                'pluginOptions' => ['allowClear' => true],
//            ],
//        ],
//            'subtype_id',
                        'subtype_name',
                        'subtype_notes',
                        
                    ],
                ])
                ?>
            </div>
        </div>

    </div>
