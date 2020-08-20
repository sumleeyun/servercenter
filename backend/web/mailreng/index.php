<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DboiduserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dboidgusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dboidguser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dboidguser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Email:email',
            'IdCard',
            'IdGvm',
            'BirthDate',
            //'FirstName',
            //'LastName',
            //'FirstNameEn',
            //'LastNameEn',
            //'Rank',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
