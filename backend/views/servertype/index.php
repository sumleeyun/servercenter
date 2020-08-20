<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\servertypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประเภทเครื่องแม่ข่าย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="server-type-index">

    <h1><?php // Html::encode($this->title)  ?></h1>
    <p>
        <?= Html::button('<span class="glyphicon glyphicon-plus"></span> เพิ่ม', ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modelServerType']) ?>


        <?php /* echo Html::a('<span class="glyphicon glyphicon-comment"></span>',
          ['Create'],//'id' => $model->id],
          [
          'title' => 'เพิ่ม',
          'data-toggle'=>'modal',
          'data-target'=>'#modelButton',
          ]
          ); */
        ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'server_type_id',
            'server_type_name',
            'server_type_name_eng',
            'server_type_note:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
<?php
Modal::begin([
    //'headerOptions' => ['id' => 'modalHeader'],
    'header' => '<h4>' . $this->title . '</h4>',
    'id' => 'modal',
    'size' => 'modal-lg',
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
        //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modelContent'></div>";
Modal::end();
?>


