<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\support_serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลการปฏิบัติงาน';
$this->params['breadcrumbs'][] = $this->title;
if ($ch == 'D') {
    header("refresh: 10;");
}
?>
<?= Html::a('งานประจำวัน', ['index'], ['class' => 'btn btn-success']) ?>
<?php // Html::a('งานประจำเดือน', ['dashboard','ch'=>'M'], ['class' => 'btn btn-success'])   ?>
<?php // Html::a('งานประจำบุคคล', ['dashboard','ch'=>'U'], ['class' => 'btn btn-success'])   ?>
<div class="support-service-index">
    <center>
        <h1><?php echo "ผลการปฏิบัติงานประจำวันที่<br>" . date('Y-m-d'); ?></h1>
    </center>


    <?php //Pjax::begin(); ?>
    <?php
    //$this->render('_search', ['model' => $searchModel,'action' => 'dashboard']);   
    ?>


    <?php
    //$now=date('Y-m-d');
    
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'service_id',
        'service_name',
        [
            'label' => 'จำนวนงานทั้งหมดตามประเภทงาน',
            'attribute' => 'serviceCount',
            'value' => 'serviceCount',
         
        ],
        
        //'service_subtype.subtype_name',
        //'service_type.type_name',
        /* [
          'attribute' => 'subtype_id',
          'filter' => ArrayHelper::map(app\models\support_service_subtype::find()->all(), 'subtype_id', 'subtype_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
          //'format' => 'html',
          'label' => 'รายละเอียดของงาน',
          'value' => function($model) {
          return $model->subtype_id ? $model->service_subtype->subtype_name : $model->subtype_id;
          }
          ], */

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
        /* [
          'attribute' => 'channel_id',
          'filter' => ArrayHelper::map(app\models\support_Channel::find()->all(), 'channel_id', 'channel_name'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
          //'format' => 'html',
          'label' => 'ช่องทางติดต่อ',
          'value' => function($model) {
          return $model->channel_id ? $model->service_channel->channel_name : $model->channel_id;
          }
          ], */
        'service_Url.url_name:url',
        'worknum',
        //'notes:ntext',
        'request_id',
        'request_date',
        /* [
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
          ], */
        'service_date',
        //'urgency_id',
        //'level_id',
        'status_id',
        //'reserved',
        'response_id',
        ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',],
            ]
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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



</div>
<?php // Pjax::end(); ?>
</div>
