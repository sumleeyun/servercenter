<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\capa\models\Capauser */

$this->title = Yii::t('app', 'จัดเก็บข้อมูลสิทธิ์');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Capausers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capauser-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'id' => $id,
    ]) ?>

</div>
