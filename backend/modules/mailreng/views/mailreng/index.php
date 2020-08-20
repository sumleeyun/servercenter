<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\modules\mailreng\models\DboIdgunit;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DboiduserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้ในกองทัพอากาศ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dboidguser-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('addmail', ['adduser'], ['class' => 'btn btn-success']) ?>
         <?= Html::a('create', ['create'], ['class' => 'btn btn-success']) ?>
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
           
            'UserName',
             'rankname',
            'rtafdata.person_Fname',
              'rtafdata.person_Lname',
            'IdCard',
              'rtafdata.person_IdCard',
            'IdGvm',
              'rtafdata.person_IdGvm',
           // 'Email:email',
            //'IdCard',
           // 'IdGvm',
            //'BirthDate',
            //'FirstName',
            //'LastName',
            //'FirstNameEn',
            //'LastNameEn',
            //'Rank',
            //'unitname.FullName',
           [
            'attribute' => 'Unit',
            'filter' => ArrayHelper::map(DboIdgunit::find()->asArray()->all(), 'Code', 'FullName'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
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
                'unitname.OUName',
            //'Unit',
            //'Password',
            //'Format',
            //'Question',
            //'Answer',
            //'Position',
            //'UserName',
            //'Name',
                
                [
                'attribute' => 'ADStatus',
                'filter' => [ '1' => 'Wait', '2' => 'Active', '3' => 'Disable'], //กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {

                    switch ($model->MailStatus) {
                        case 1: return '<span class="label label-warning">Wait</span>';
                            break;
                        case 2: return '<span class="label label-primary">Active</span>';
                            break;
                        case 3: return'<span class="label label-danger">Disable</span>';
                            break;
                       
                        default : return '<span class="label label-info">อื่นๆ</span>';
                    }
                }
            ],
                
                
                [
                'attribute' => 'MailStatus',
                'filter' => [ '1' => 'NoMail', '2' => 'Active', '3' => 'Disable'], //กำหนด filter แบบ dropDownlist จากข้อมูล array
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {

                    switch ($model->MailStatus) {
                        case 1: return '<span class="label label-warning">NO MAIL</span>';
                            break;
                        case 2: return '<span class="label label-primary">Active</span>';
                            break;
                        case 3: return'<span class="label label-danger">Disable</span>';
                            break;
                       
                        default : return '<span class="label label-info">อื่นๆ</span>';
                    }
                }
            ],
                
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

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{chk}',
            'buttons' => [
                'chk' => function($url, $model, $key) {
                    return '
                                            <a data-method="POST" data-confirm="' . Yii::t('user', 'ยืนยัน') . '" href="' . Url::to(['change', 'id' => $model->UserName, 'chk' => 'status']) . '">
                                            <span title="' . Yii::t('user', 'ตรวสอบสถานะ') . '" class="glyphicon glyphicon-pencil">
                                            </span></a>';
                },
            ],
        ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
