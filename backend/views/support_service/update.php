<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\support_service */

$this->title = 'Update Support Service: ' . $model->service_id;
$this->params['breadcrumbs'][] = ['label' => 'Support Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service_id, 'url' => ['view', 'id' => $model->service_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-service-update">

  

    <?= $this->render('_form', [
        'model' => $model,
         'modelsubtype' => $modelsubtype,
        'chk' => 'update',
    ]) ?>

</div>
