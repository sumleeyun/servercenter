<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Components */

$this->title = 'Create Components';
$this->params['breadcrumbs'][] = ['label' => 'Components', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="components-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
