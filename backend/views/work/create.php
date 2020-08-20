<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tblwork */

$this->title = 'เพิ่มงาน';
$this->params['breadcrumbs'][] = ['label' => 'Tblworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblwork-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
