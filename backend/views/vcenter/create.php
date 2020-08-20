<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\vcenterhosts */

$this->title = 'Create VM';
$this->params['breadcrumbs'][] = ['label' => 'Vcenterhosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcenterhosts-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
