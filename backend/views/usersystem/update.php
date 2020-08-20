<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblUserSystem */

$this->title = 'จัดเก็บ user/password system ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Systems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-user-system-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
