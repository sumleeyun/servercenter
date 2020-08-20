<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblUserSystem */

$this->title = 'จัดเก็บ user/password system';
$this->params['breadcrumbs'][] = ['label' => 'User Systems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-user-system-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
