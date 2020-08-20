<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\licenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลลิขสิทธิ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="license-index">

    <h1><?php //  Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
         <?php
//        Html::button('<span class="glyphicon glyphicon-plus"></span> เพิ่ม', [
//            'value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'BtnModelLicense',
//            //'data-toggle' => 'modal',
            //'data-target' => '#modal-components',
//        ])
        ?>
    </p>
    
    
    <?php
    Modal::begin([
        //'headerOptions' => ['id' => 'modalHeader'],
        'header' => '<h4>' . $this->title . '</h4>',
        'id' => 'modalLicense',
        'size' => 'modal-lg',
            //keeps from closing modal with esc key or by clicking out of the modal.
            // user must click cancel or X to close
            //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modalContentLicense'></div>";
    Modal::end();
    ?>
<?php
    
        $gridColumns = [
            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'software',
            'description',
            'qua_all',
            'qua_usad',
            'qua_available',
            'license_detail',
//            'license_key',
            'start_date',
            'expire_date',
            'status',
            'operate_by',
            'note:ntext',
            //'software_id',

            
        ]; ?>
    
    
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
