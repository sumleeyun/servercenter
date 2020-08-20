<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblDepartment */

$this->title = 'เพิ่มหน่วยงานขึ้นตรง ทอ.';
$this->params['breadcrumbs'][] = ['label' => 'หน่วยขึ้นตรง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-department-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        //'listData'=>$listData,
    ]) ?>

</div>
