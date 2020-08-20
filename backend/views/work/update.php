<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tblwork */

$this->title = 'Update Tblwork: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
