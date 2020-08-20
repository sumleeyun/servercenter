<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Programdetail */

$this->title = 'Create Programdetail';
$this->params['breadcrumbs'][] = ['label' => 'Programdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
