<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อข้าราชการเข้าใช้ระบบ KM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('เพิ่มรายชื่อ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
              'panel'=>[
            'before'=>' '
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'prefix',
            'name',
            //'position',
            //'group_id',
            //'pergroup.group_name',
            [
                'attribute' => 'group_id',
                'filter' => ArrayHelper::map(\app\models\Pergroup::find()->all(), 'id', 'group_name'),//กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                 //'format' => 'html',
                'label' =>'สังกัด',
                'value' => function($model){
                    return $model->group_id ? $model->pergroup->group_name: $model->group_id;
                }
            ],
            
            //'status_kms',
            [
                'attribute' => 'status_kms',
                'filter' => [ 0 => 'เข้าแล้ว',1 => 'ยังไม่เข้า'],//กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'html',
                'value' => function($model, $key, $index, $column) {
                    return $model->status_kms == 1 ? "<i class=\"glyphicon glyphicon-ok\"></i>" : " not null</i>";
                }
            ],
           // 'status_social',
                     [
                'attribute' => 'status_social',
                'filter' => [ 1 => 'เข้าแล้ว',0 => 'ยังไม่เข้า'],//กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'html',
                'value' => function($model, $key, $index, $column) {
                    return $model->status_social == 0 ? "<i class=\"glyphicon glyphicon-remove\"></i>" : "<i class=\"glyphicon glyphicon-ok\"></i>";
                }
            ],
            'person_note',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{kms}{social}{view}{update}{delete} ',
                'buttonOptions' => ['class' => 'btn btn-default'],
                'buttons' => [
                   /* 'view' => function($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open">รายละเอียด  </i>  ', $url);
                    },*/
                    'kms' => function ($url, $model, $key) {

                        return '
                    <a data-method="POST" data-confirm="confirm KMS" href="' . Url::to(['kms', 'id' => $model->id]) . '">
                    <span title="" class="glyphicon glyphicon-edit">
                    </span>KMS </a> ';
                    },
                    'social' => function ($url, $model, $key) {

                        return '
                    <a data-method="POST" data-confirm="confirm social" href="' . Url::to(['social', 'id' => $model->id]) . '">
                    <span title="" class="glyphicon glyphicon-edit">
                    </span>Social</a> ';
                    },
                ],
            ],],
                            
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
