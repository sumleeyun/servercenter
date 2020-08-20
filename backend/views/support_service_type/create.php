<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\support_service_type */

$this->title = 'เพิ่มประเภทงานบริการ';
$this->params['breadcrumbs'][] = ['label' => 'Support Service Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-service-type-create">

    <h1><?php //  Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
