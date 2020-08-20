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

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->service_id], ['class' => 'btn btn-primary']) ?>
         
        <?= Html::a('Delete', ['delete', 'id' => $model->service_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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

</div>
