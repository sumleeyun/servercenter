<?php
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?php // Pjax::begin(['id' => "pjax-{$id}", 'enablePushState' => false]); ?>


<?php
$gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            
            //['class' => 'yii\grid\ActionColumn', ],
            'subtype_id',
            'subtype_name',
            //'type_id',
            //'subtype_notes',
            'active',
           
];
?>

<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    /* 'options' => [
      'id' => 'gridview-id'
      ],
      'rowOptions' => function ($model, $key, $index, $grid) { //สามารถกำหนด data-key ใหม่ (ปกติจะใช้ PK)
      return ['data' => ['key' => $model->other_key]];
      }, */
    'columns' => $gridColumns,
    'responsive' => true,
    'hover' => true
]);
?>

<?php // Pjax::end(); ?>