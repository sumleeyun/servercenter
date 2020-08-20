<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblMenu */

$this->title = 'Create Tbl Menu';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
