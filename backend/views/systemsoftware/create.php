<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSystemsoftware */

$this->title = 'ข้อมูลระบบงาน';
$this->params['breadcrumbs'][] = ['label' => 'หน้าหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-systemsoftware-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
