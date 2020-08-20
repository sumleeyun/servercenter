<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tblMailresto */

$this->title = 'Create Tbl Mailresto';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mailrestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mailresto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
