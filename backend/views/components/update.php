<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Components */

$this->title = 'Update Components: ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Components', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="components-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
