<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\usersystemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดเก็บ user/password system';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-user-system-index">


    
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
    

 <p>
        <?=
        Html::button('<span class="glyphicon glyphicon-plus"></span> เพิ่ม', [
            'value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'BtnModelUsersystem',
            //'data-toggle' => 'modal',
            //'data-target' => '#modal-components',
        ])
        ?>
    
    </p>

    <?php
    Modal::begin([
        //'headerOptions' => ['id' => 'modalHeader'],
        'header' => '<h4>' . $this->title . '</h4>',
        'id' => 'modal-usersystem',
        'size' => 'modal-lg',
            //keeps from closing modal with esc key or by clicking out of the modal.
            // user must click cancel or X to close
            //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modelContent'></div>";
    Modal::end();
    ?>
<?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before' => ' '
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name',
            'username',
            'password',
            'block',
            //'note',
            //'created_at',
            //'update_at',
            //'created_by',
            //'update_by',
          'systemsoftware.systemname',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
<?php Pjax::end(); ?>
</div>
