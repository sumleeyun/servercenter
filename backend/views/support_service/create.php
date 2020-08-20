<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\support_service */

$this->title = 'Create Support Service';
$this->params['breadcrumbs'][] = ['label' => 'Support Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-service-create">

   

    <?= $this->render('_form', [
        'model' => $model,
        'modelsubtype' => $modelsubtype,
        'chk' => 'create',
    ]) ?>

</div>
