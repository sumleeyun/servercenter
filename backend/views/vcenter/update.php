<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\vcenterhosts */

$this->title = 'Update Vcenterhosts: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vcenterhosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vcenterhosts-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
