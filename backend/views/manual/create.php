<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Manual */

$this->title = 'Create Manual';
$this->params['breadcrumbs'][] = ['label' => 'Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
