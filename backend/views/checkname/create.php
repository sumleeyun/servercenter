<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCheckName */

$this->title = 'Create Tbl Check Name';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Check Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-check-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
