<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\vcenterhostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vcenterhosts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcenterhosts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vcenterhosts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'server_id',
            'ip',
            'model',
            'license',
            //'cpu',
            //'memory',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
