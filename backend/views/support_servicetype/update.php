<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\support_service_type */

$this->title = 'Update Support Service Type: ' . $model->type_id;
$this->params['breadcrumbs'][] = ['label' => 'Support Service Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_id, 'url' => ['view', 'id' => $model->type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-service-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
