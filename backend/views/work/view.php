<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Tblwork */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดดำเนินงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$idsys = $model->server_ip;
$dataServer = app\models\TblServerall::find()
        ->where('systemsoftware_id' == $idsys)
        ->all();
?>




<div class="tblwork-view">



    <p>
        <?= Html::a('Create งาน ', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'topic',
            'eadmin_sn',
            'systemsoftware.systemname',
            'urlname.URL:url',
            'department.nameDepartment',
            'department.initials',
            'note:ntext',
            'date_job',
            'Status',
            'created_at',
            'created_by',
            'updated_at',
            //'updated_by',
            [
                'label' => 'เจ้าหน้าที่',
                'value' => $model->profile->name,
            ],
        ],
    ])
    ?>
</div>
<div class="box box-success">
    <div class="box-header"><i class="glyphicon glyphicon-oil"></i> รายละเอียด Server</div>
    <div class="box-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'IpServer',
                [
                'attribute' => 'IpServer', //your model attribute
                'format' => 'raw',
                'value' => function ($model, $index, $column) {
                    return Html::a(
                                    $model->IpServer.' <span class="glyphicon glyphicon-eye-open"></span>', //link text
                                    ['/server/view', 'id' => $model->IpServer], //link url to some route
                                    [// link options
                                'title' => 'แสดงserver',
                                'target' => '_blank'
                                    ]
                    );
                }
            ],
                
                'admindetail.name',
                'TypeServer:ntext',
                'OS:ntext',
                'cpu',
                'memory',
                'harddisk',
            ],
        ]);
        ?>
    </div>
</div>
