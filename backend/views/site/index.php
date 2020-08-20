<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

$this->title = 'site';
?>
<div class="tbl-serverall-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>



    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        //'id',
        //'systemname',
        [
            'attribute' => 'systemname', //your model attribute
            'format' => 'raw',
            'value' => function ($model, $index, $column) {
                return Html::a(
                                $model->systemname . ' <span class="glyphicon glyphicon-eye-open"></span>', //link text
                                ['systemsoftware/view', 'id' => $model->id], //link url to some route
                                [// link options
                            'title' => 'แสดงรายละเอียด',
                            'target' => '_blank'
                                ]
                );
            }
        ],
        'unitrtaf.nameDepartment',
        [
            'label' => 'เจ้าหน้าที่ติดต่อ',
            'format' => 'raw',
            'value' => 'adminName.name',
        ],
        //'adminName.name',
        'system_dayjob',
        //'company.company_nameT',
        //'create_at',
        //'update_at',
        //'update_by',
        //['class' => 'yii\grid\ActionColumn'],
    ];
    ?>
    <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax', 'timeout' => 5000]) ?>
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
    <?php yii\widgets\Pjax::end() ?>




    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">server</h3>
        </div><!-- /.box-header -->
        <div class="box-body">


        </div>
    </div>
    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">web site</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

        </div>
    </div>
</div>