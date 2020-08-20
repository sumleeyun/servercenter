<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dboidguser */

$this->title = 'Update Dboidguser: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Dboidgusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dboidguser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
