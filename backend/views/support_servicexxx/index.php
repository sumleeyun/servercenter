<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\support_serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'งานบริการ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-service-index">
<p>
<?= Html::a('แจ้งความต้องการ', ['create'], ['class' => 'btn btn-success']) ?>
    
    <?= Html::a('ตารางปฏิบัติงานประจำวัน', ['dashboard','ch'=>'D'], ['class' => 'btn btn-success']) ?>
     <?php // Html::a('Update', ['update', 'id' => $model->service_id], ['class' => 'btn btn-primary']) ?>
</p> 
    <?php Pjax::begin(); ?>
<?php echo $this->render('_search', ['model' => $searchModel]);   ?>

    

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'service_id',
        'service_name',
       
        //'service_subtype.subtype_name',
        
        //'service_type.type_name',
         [
            'attribute' => 'subtype_id',
            'filter' => ArrayHelper::map(app\models\support_service_subtype::find()->all(), 'subtype_id', 'subtype_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            //'format' => 'html',
            'label' => 'รายละเอียดของงาน',
            'value' => function($model) {
                return $model->subtype_id ? $model->service_subtype->subtype_name : $model->subtype_id;
            }
        ],
        
        [
            'attribute' => 'type_id',
            'filter' => ArrayHelper::map(app\models\support_service_type::find()->all(), 'type_id', 'type_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            //'format' => 'html',
            'label' => 'ประเภทของงาน',
            'value' => function($model) {
                return $model->type_id ? $model->service_type->type_name : $model->type_id;
            }
        ],
        'service_Channel.channel_name',
        /*[
            'attribute' => 'channel_id',
            'filter' => ArrayHelper::map(app\models\support_Channel::find()->all(), 'channel_id', 'channel_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            //'format' => 'html',
            'label' => 'ช่องทางติดต่อ',
            'value' => function($model) {
                return $model->channel_id ? $model->service_channel->channel_name : $model->channel_id;
            }
        ],   */     
                
        'service_Url.url_name:url',
        'worknum',
        //'notes:ntext',
        'request_id',
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
        'service_status.status_name',
        //'reserved',
        'response_id',
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
