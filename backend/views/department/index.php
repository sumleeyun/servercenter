<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Components;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'หน่วยงาน นขต.ทอ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-department-index">

    

    <p>
    <?php // Html::button('<span class="glyphicon glyphicon-plus"></span> เพิ่ม', ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modelDepartment']) ?>
        
    <?= Html::a('<span class="glyphicon glyphicon-share"></span> เพิ่ม', ['create'],['class' => 'btn btn-success']) ?>  
    <?= Html::a('<span class="glyphicon glyphicon-share"></span> ส่วนราชการ', ['/components/index'],['class' => 'btn btn-success']) ?>
    
    </p>
    
    <?php
    Modal::begin([
        'headerOptions' => ['id' => 'modalHeader'],
        //'header' => '<h4>' . $this->title . '</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
            //keeps from closing modal with esc key or by clicking out of the modal.
            // user must click cancel or X to close
            //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modelContent'></div>";
    Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
           
            //'codeDepartment',
            'nameDepartment',
            'initials',
            'componentsx.nameComponents',
            'under.nameDepartment',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
