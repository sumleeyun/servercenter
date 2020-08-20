<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อระบบงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-menu-index">

    

    <p>
        <?= Html::a('Create Tbl Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
             ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],

            //'idMenu',
            'nameMenu',
           
            'urlMenu:url',
            'noteMenu:ntext',

           
        ],
    ]); ?>
</div>
