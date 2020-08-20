<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSystemsoftware */

$this->title = 'ข้อมูลระบบงาน' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Systemsoftwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-systemsoftware-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
