<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Website */

$this->title = 'Update Website: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Websites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="website-update">

    

    <?= $this->render('_form', [
        'model' => $model,
         'modelSystem' => '',
    ]) ?>

</div>
