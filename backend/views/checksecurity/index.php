<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\checksecuritySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Check Securities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-check-security-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Check Security', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'check_id',
            'server_ip',
            'check_dns',
            
            'check_ad',
            'check_antivirus',
            'check_cypber',
           /* [
                'attribute' => 'check_cypber',
                //'filter' => [0 => 'Inactive', 1 => 'Active'],//กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'html',
                'value' => function($model, $key, $index, $column) {
                    return empty($model->check_cypber) ? "<i class=\"glyphicon glyphicon-remove\"></i>" : "<i class=\"glyphicon glyphicon-ok\"></i>";
                }
            ],*/
            
                    
                    
                    
            'created_at',
            'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
