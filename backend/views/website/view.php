<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Website */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Websites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="website-view">



    <p>
        <?= Html::a('กลับไประบบงาน', ['systemsoftware/view', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    
    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">view</h3>
        </div><!-- /.box-header -->
        <div class="box-body">


            <iframe src= <?php echo $model->domainName; ?> align="top" width="300" height="250"></iframe>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    //'URL:url',
                    'domainName:url',
                    'short_remarks:ntext',
                    'ipServer',
                    'ipMapServer',
                    'history1',
                    'history2',
                    'history3',
                    'department.nameDepartment',
                    //'adminDetail',
                    'userDetail.name',
                    'status1.name',
                    'software',
                    'software_detail',
                    'userweb',
                    'pwdweb',
                    'userFtp',
                    'pwdFtp',
                    'dbName',
                    'userDb',
                    'pwdDb',
//                    'created',
//                    'created_by',
//                    'modified',
//                    'modified_by',
                ],
            ])
            ?>
<?php ?>
        </div>
    </div>

   <div class="row">

            <div class="col-md-2"><h4>สถานะ:<span class="label <?php if($model->status1->id == 6){echo "label-danger" ;}else{ echo "label-primary";} ?>"><?php echo $model->status1->name; ?></span></h1></div>
            <div class="col-md-2">ผู้ดูแล:<?php if($model->adminDetail){ echo $model->userDetail->name; } ?></div>
            <div class="col-md-2">เจ้าหน้าที่สร้าง :
                <?php // if ($model->created_by) {
//                        echo $model->userCreated->name;
//                    } ?></div>
            <div class="col-md-2">วันที่สร้าง :<?php echo $model->created; ?></div>        
            <div class="col-md-2">เจ้าหน้าที่แก้ไข :<?php if ($model->modified_by) {
                        echo $model->userUpdated->name;
                    } ?></div>
            <div class="col-md-2">วันที่แก้ไข :<?php echo $model->modified; ?></div>      



        </div> 
    
    
</div>
