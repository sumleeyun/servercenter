<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ส่วนราชการ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="components-index">



    <p>
        <?php // Html::a('Create Components', ['create'], ['class' => 'btn btn-success']) ?>
<?php // Html::button('Create List', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['components/create']), 'class' => 'btn btn-success'])  ?>
    </p>

    <p>
        <?=
        Html::button('<span class="glyphicon glyphicon-plus"></span> เพิ่ม', [
            'value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'BtnModelComponents',
            //'data-toggle' => 'modal',
            //'data-target' => '#modal-components',
        ])
        ?>
    <?= Html::a('<span class="glyphicon glyphicon-share"></span> หน่วยขึ้นตรง ทอ.', ['/department/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    Modal::begin([
        //'headerOptions' => ['id' => 'modalHeader'],
        'header' => '<h4>' . $this->title . '</h4>',
        'id' => 'modal-components',
        'size' => 'modal-lg',
            //keeps from closing modal with esc key or by clicking out of the modal.
            // user must click cancel or X to close
            //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modelContent'></div>";
    Modal::end();
    ?>



    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'code',
            'nameComponents',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
