<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\support_serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<?php echo $this->render('_search', ['model' => $searchModel]);   ?>

    <p>
<?= Html::a('Create Support Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        //'service_id',
        'service_name',
        'subtype_id',
        //'service_type.type_name',
        [
            'attribute' => 'type_id',
            'filter' => ArrayHelper::map(app\models\support_service_type::find()->all(), 'type_id', 'type_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            //'format' => 'html',
            'label' => 'ประเภทของงาน',
            'value' => function($model) {
                return $model->type_id ? $model->service_type->type_name : $model->type_id;
            }
        ],
        'channel_id',
        'url_id:url',
        //'worknum',
        //'notes:ntext',
        //'request_id',
        'request_date',
        /*[
            'attribute' => 'request_date',
            'label' => 'request_date',
            'format' => 'text',
            'filter' => '<div class="drp-container input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>' .
            DateRangePicker::widget([
                'name' => 'ItemOrderSearch[request_date]',
                'pluginOptions' => [
                    'locale' => [
                        'separator' => 'to',
                    ],
                    'opens' => 'right'
                ]
            ]) . '</div>',
            'content' => function($model) {
                return Yii::$app->formatter->asDatetime($data['request_date'], "php:d-M-Y");
            }
        ],*/
        'service_date',
        //'urgency_id',
        //'level_id',
        //'status_id',
        //'reserved',
        //'response_id',
        ['class' => 'yii\grid\ActionColumn'],
            ]
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

    <?php Pjax::end(); ?>
</div>
