<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DboiduserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้าราชการกองทัพอากาศ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dboidguser-index">

    <h1><?php // Html::encode($this->title)  ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php Html::a('addmail', ['create'], ['class' => 'btn btn-success'])  ?>
    </p>

    <?=
    GridView::widget([
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
            ['class' => 'yii\grid\CheckboxColumn'],
            //['class' => 'yii\grid\SerialColumn'],
            [
//                'label' => 'สร้างเมล์',
                'format' => 'raw',
                'value' => function($model) {

                    return Html::a(Yii::t('app', ' {modelClass}', [
                                        'modelClass' => 'สร้างเมล์',
                                    ]), ['create', 'id' => $model->person_UID], ['class' => 'btn btn-success']);
                }
            ],
//            'person_UID',
            'person_IdCard',
            'person_IdGvm',
            'rankrtaf.Name',
            'person_Fname',
            'person_Lname',
            'person_Fname_Eng',
            'person_Lname_Eng',
            'person_Birthdate',
            'person_Position',
//            'person_Status',
//            'person_Rank_Code',
//            'person_Unit_Code',
//            'person_UpdateDate',
//            'person_CreateDate',
            [
                'attribute' => 'person_Unit_Code',
                'filter' => ArrayHelper::map(app\models\DboIdgunit::find()->asArray()->all(), 'Code', 'FullName'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => ['allowClear' => true],
                ],
//'format' => 'html',
                'label' => 'หน่วยงาน',
                'value' => function($model) {
                    return $model->person_Unit_Code ? $model->unitname->FullName : $model->Unit;
                }
            ],
        //['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
