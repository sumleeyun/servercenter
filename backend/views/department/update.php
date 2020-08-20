<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblDepartment */

$this->title = 'Update Tbl Department: ' . $model->codeDepartment;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codeDepartment, 'url' => ['view', 'id' => $model->codeDepartment]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-department-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
