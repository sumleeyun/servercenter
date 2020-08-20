<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServerType */

$this->title = 'เพิ่ม';
$this->params['breadcrumbs'][] = ['label' => 'Server Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="server-type-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
