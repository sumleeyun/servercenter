<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblServerall */

$this->title = 'Update Tbl Serverall: ' . $model->IpServer;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลserver', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IpServer, 'url' => ['view', 'id' => $model->IpServer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-serverall-update">

  

    <?= $this->render('_form', [
        'model' => $model,//'software'=>$software,
         'system_id' => $system_id
        
    ]) ?>

</div>
