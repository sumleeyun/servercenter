<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admindetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลเจ้าหน้าที่ ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-detail-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Admin Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before' => ' '
        ],
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name',
            'username',
            //'password',
            //'Department',
            //'department.nameDepartment',
            [
                'attribute' => 'Department',
                'label' => 'หน่วยงาน',
                'filter' => ArrayHelper::map(app\models\TblDepartment::find()->asArray()->all(), 'codeDepartment', 'nameDepartment'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => ['allowClear' => true],
                ],
//'format' => 'html',
                
                'value' => function($model) {
                    return $model->Department ? $model->department->nameDepartment : $model->Department;
                }
            ],
            'tel',
            //'email:email',
            'block',
        //'sendEmail:email',
        ],
    ]);
    ?>
</div>
