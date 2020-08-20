<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblMenu */

$this->title = 'Update Tbl Menu: ' . $model->idMenu;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMenu, 'url' => ['view', 'id' => $model->idMenu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
