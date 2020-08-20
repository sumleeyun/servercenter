<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DboiduserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดเก็บข้อมูลสิทธิ์  ผู้ใช้ระบบในกองทัพอากาศ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dboidguser-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
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
             [ 'class' => 'yii\grid\CheckboxColumn'],
            //['class' => 'yii\grid\SerialColumn'],

           // 'id',
//            'UserName',
            
            [
                'attribute' => 'UserName', //your model attribute
                'format' => 'raw',
                'value' => function ($model, $index, $column) {
                    return Html::a(
                                    $model->UserName, //link text
                                    ['create', 'id' => $model->UserName], //link url to some route
                                    [// link options
                                'title' => 'เก็บข้อมูล',
                                'target' => '_blank'
                                    ]
                    );
                }
            ],
            
//            'rtafdata.person_Fname',
//              'rtafdata.person_Lname',
//            'IdCard',
//              'rtafdata.person_IdCard',
//            'IdGvm',
//              'rtafdata.person_IdGvm',
           // 'Email:email',
            //'IdCard',
           // 'IdGvm',
            //'BirthDate',
            'FirstName',
            'LastName',
            //'FirstNameEn',
            //'LastNameEn',
            //'Rank',
            //'unitname.FullName',
           [
            'attribute' => 'Unit',
            'filter' => ArrayHelper::map(\backend\modules\mailreng\models\DboIdgunit::find()->asArray()->all(), 'Code', 'FullName'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
//'format' => 'html',
            'label' => 'หน่วยงาน',
            'value' => function($model) {
                return $model->Unit ? $model->unitname->FullName : $model->Unit;
            }
        ],
         //       'unitname.OUName',
            //'Unit',
            //'Password',
            //'Format',
            //'Question',
            //'Answer',
            //'Position',
            //'UserName',
            //'Name',
            //'ADStatus',
            //'MailStatus',
            //'Type',
            //'Tel',
            //'Type_Rank',
            //'UpdateDate',
            //'CreateDate',
            //'Remark',
            //'PasswordOld',
            //'Permission',
            //'Division',
            //'WorkingYear',
            //'WorkingRank',
            //'PosAction',
            //'SecEmail:email',
            //'status',

           
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
