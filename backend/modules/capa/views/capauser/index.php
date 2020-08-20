<?php

use yii\helpers\Html;

use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\capa\models\capauserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ข้อมูลสิทธิ์ผู้ใช้ระบบ ทอ.');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capauser-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Capauser'), ['create'], ['class' => 'btn btn-success']) ?>
<?= Html::a(Yii::t('app', 'Check User'), ['add'], ['class' => 'btn btn-success']) ?>
    </p>

      <?= GridView::widget([
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'username',
            //'userRtaf.Rank',
//             [// แสดงข้อมูลออกเป็นสีตามเงื่อนไข
//                'label' => 'ชื่อ',
//                'format' => 'html',
//                'value' => function($model, $key, $index, $column) {
//                    
//          return $model->userRtaf->fullname;
//                }
//            ],
////            
//            [
//                'attribute' => 'program',
//                'label' => 'ระบบงาน',
//                'value' => function($model) {
//                    return $model->program?$model->software->systemname:'NULL';
//                }
//            ],
                    
            [// แสดงข้อมูลออกเป็นสีตามเงื่อนไข
                'attribute' => 'vpn',
                'format' => 'html',
                'value' => function($model, $key, $index, $column) {
                    return $model->vpn == 1 ? "<span style=\"color:green;\">YES</span>" : "<span style=\"color:red;\">No</span>";
                }
            ],
                    [// แสดงข้อมูลออกเป็นสีตามเงื่อนไข
                'attribute' => 'otp',
                'format' => 'html',
                'value' => function($model, $key, $index, $column) {
                    return $model->otp == 1 ? "<span style=\"color:green;\">YES</span>" : "<span style=\"color:red;\">No</span>";
                }
            ],
                    [// แสดงข้อมูลออกเป็นสีตามเงื่อนไข
                'attribute' => 'cyberark',
                'format' => 'html',
                'value' => function($model, $key, $index, $column) {
                    return $model->cyberark == 1 ? "<span style=\"color:green;\">YES</span>" : "<span style=\"color:red;\">No</span>";
                }
            ],
                    
//            'vpn',
//            'otp',
//            'cyberark',
//           'channelName.channel_name',
                    [
                        'attribute' => 'channel',
                        'label' => 'ช่องทางติดต่อง',
                        'value' => 'channelName.channel_name'
                    ],
            //'note:ntext',
            //'check',
            //'updated_at',
            //'updated_by',
//            'created_at',
            [
                'attribute' => 'created_at',
                'label' => 'วันที่เพิ่ม',
                'value' => function($model) {

                    $datex = Yii::$app->thaiFormatter->asDate($model->created_at, 'short');

                    return $datex;
                }
            ],
            [
                'attribute' => 'created_by',
                'label' => 'ผู้ดำเนินการ',
                'value' => function($model) {
                    return $model->userCreated->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
