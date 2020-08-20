<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dboidguser */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Dboidgusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dboidguser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Email:email',
            'IdCard',
            'IdGvm',
            'BirthDate',
            'FirstName',
            'LastName',
            'FirstNameEn',
            'LastNameEn',
            'Rank',
            'Unit',
            'Password',
            'Format',
            'Question',
            'Answer',
            'Position',
            'UserName',
            'Name',
            'ADStatus',
            'MailStatus',
            'Type',
            'Tel',
            'Type_Rank',
            'UpdateDate',
            'CreateDate',
            'Remark',
            'PasswordOld',
            'Permission',
            'Division',
            'WorkingYear',
            'WorkingRank',
            'PosAction',
            'SecEmail:email',
            'status',
        ],
    ]) ?>

</div>
