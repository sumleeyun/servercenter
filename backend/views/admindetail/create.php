<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdminDetail */

$this->title = 'Create Admin Detail';
$this->params['breadcrumbs'][] = ['label' => 'Admin Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-detail-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
