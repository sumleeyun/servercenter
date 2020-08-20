<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServerType */

$this->title = 'Update Server Type: ' . $model->server_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Server Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->server_type_id, 'url' => ['view', 'id' => $model->server_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="server-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
