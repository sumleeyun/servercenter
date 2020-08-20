<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCheckSecurity */

$this->title = 'Create Tbl Check Security';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Check Securities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-check-security-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
