<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dboidguser */

$this->title = 'Create Dboidguser';
$this->params['breadcrumbs'][] = ['label' => 'Dboidgusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dboidguser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
