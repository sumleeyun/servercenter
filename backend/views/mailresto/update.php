<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tblMailresto */

$this->title = 'Update Mail restore: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mail restore', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-mailresto-update">

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
