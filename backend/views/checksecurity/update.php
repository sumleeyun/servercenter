<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCheckSecurity */

$this->title = 'Update Tbl Check Security: ' . $model->check_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Check Securities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->check_id, 'url' => ['view', 'id' => $model->check_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-check-security-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
