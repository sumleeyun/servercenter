<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datastore */

$this->title = 'Create Datastore';
$this->params['breadcrumbs'][] = ['label' => 'Datastores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datastore-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
