<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\systemsoftwareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระบบงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-systemsoftware-index">

    <p>
<?= Html::a('<span class="glyphicon glyphicon-pencil"></span>เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

       <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]) ?>
    <p>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </p>
    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">..</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?=
            GridView::widget([
                'tableOptions' => [
                    'class' => 'table table-striped table-hover',
                    'width' => '100%',
                    'cellspacing' => '0'
                ],
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'persistResize' => true,
                'columns' => [
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
                    'admin.name',
                    'system_dayjob',
                    //'company.company_nameT',
                    //'create_at',
                    //'update_at',
                    //'update_by',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
          <?php yii\widgets\Pjax::end() ?>
        </div>
    </div>
</div>
