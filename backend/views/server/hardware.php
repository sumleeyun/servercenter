<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;



use kartik\editable\Editable;
use yii\helpers\Json;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hardware';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-serverall-index">


    <p>
        <?= Html::a('ข้อมูล sever ทั้งหมด ', ['server/index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax', 'timeout' => 5000]) ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'persistResize' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-hover ',
        ],
        'columns' => [
            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'systemsoftware_id',
                'filter' => ArrayHelper::map(app\models\TblSystemsoftware::find()->asArray()->all(), 'id', 'systemname'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => ['allowClear' => true],
                ],
//'format' => 'html',
                'label' => 'ชื่อระบบงาน',
                'value' => function($model) {
                    return $model->systemsoftware_id ? $model->systemsoftware->systemname : $model->systemsoftware_id;
                }
            ],
            'IpServer',
            //'mapWithWapple:ntext',
            //'TypeServer:ntext',
            //'OS:ntext',
            //'program:ntext',
            //'computerName:ntext',
            'hardware:ntext',
            //'vcenterhosts.ip',
            //'systemsoftware.systemname',
            //'Description:ntext',
            'cpu',
            'memory',
            //'harddisk',
//            [
//                'class' => 'kartik\grid\EditableColumn',
//                'header' => 'แก้ไข',
//                'attribute' => 'harddisk',
//                'value' => function($model) {
//                    return $model->harddisk;
//                },
//            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'harddisk',
                'pageSummary' => true,
                'readonly' => false,
                //'value' => 'userProfiles.company',
                'content' => function($model) {
                    return '<div class="text_content">' . htmlentities($model->harddisk) . '</div>';
                },
                'editableOptions' => [
                    'header' => 'harddisk',
                    'inputType' => Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => [
                        ]
                    ]
                ],
            ],
        //'tool:ntext',
        //'servicePort:ntext',
        //'subnetMask:ntext',
        //'gateway:ntext',
        //'status:ntext',
        //'user:ntext',
        //'pw:ntext',
        //'userPwAnother:ntext',
        //'remak1:ntext',
        //'remark2:ntext',
        //'adminServer:ntext',
        //'created_by',
        //'updated_user',
        ],
    ]);
    ?>
    <?php yii\widgets\Pjax::end() ?>
    
    
    <?php // echo '2222:'.$errot; ?>
</div>
