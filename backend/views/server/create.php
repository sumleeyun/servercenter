<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblServerall */

$this->title = 'ข้อมูล server';
$this->params['breadcrumbs'][] = ['label' => 'server', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-serverall-create">



    <?=
    $this->render('_form', [
        'model' => $model,
        'system_id' => $system_id
//'software' => $software,
    ])
    ?>

</div>
