<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Website */

$this->title = 'Create Website';
$this->params['breadcrumbs'][] = ['label' => 'Websites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="website-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'modelSystem' => $modelSystem,
    ]) ?>

</div>
