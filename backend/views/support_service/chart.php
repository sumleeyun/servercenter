<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\support_service */

$this->title = $model->service_id;
$this->params['breadcrumbs'][] = ['label' => 'Support Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="support-service-view">

    


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'service_id',
            'service_name',
            'subtype_id',
            'type_id',
            'channel_id',
            'url_id:url',
            'worknum',
            'notes:ntext',
            'request_id',
            'request_date',
            'service_date',
            'urgency_id',
            'level_id',
            'status_id',
            'reserved',
            'response_id',
        ],
    ]) ?>
    <?php 
   use miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Fruit Consumption'],
      'xAxis' => [
         'categories' => ['Apples', 'Bananas', 'Oranges']
      ],
      'yAxis' => [
         'title' => ['text' => 'Fruit eaten']
      ],
      'series' => [
         ['name' => 'Jane', 'data' => [1, 0, 4]],
         ['name' => 'John', 'data' => [5, 7, 3]]
      ]
   ]
]);
?>
</div>
