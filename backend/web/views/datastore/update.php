<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datastore */

$this->title = 'Update Datastore: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datastores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datastore-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
