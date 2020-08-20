<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\mailrestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'mail restore';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tbl-mailresto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
        <?= Html::a('Mail restore', ['searchall'], ['class' => 'btn btn-success']) ?>
    <?php echo date('Y-m-d'); ?>
    
    <div class="row">
        
        <div class="col-sm-4">
            <div class="panel panel-default">
            <div class="panel-heading">จำนวน restore ทั้งหมด </div>
            <div class="panel-body">
                <?php echo "รายชื่อ mail ทั้งหมด: ".$restototal." คน"; ?>
                
                        
                <?php
                echo "<p><i class='glyphicon glyphicon-user'></i> FF_01_EX16A :$FF01EX16A</p> ";
                echo " <p><i class='glyphicon glyphicon-remove'></i> FF_07_EX16A :$FF07EX16A  </p> ";
                echo " <p><i class='glyphicon glyphicon-remove'></i> FF_07_EX16B :$FF07EX16B</p> ";
                echo " <p><i class='glyphicon glyphicon-user'></i> FF_09_EX16A :$FF09EX16A</p> ";
                echo " <p><i class='glyphicon glyphicon-user'></i> FF_10_EX16 :$FF10EX16</p> ";
                echo " <p><i class='glyphicon glyphicon-user'></i> F_11_EX16 :$FF11EX16</p> ";
                echo " <p><i class='glyphicon glyphicon-user'></i>NCO_10_EX16C : $NCO10EX16C</p> ";
                echo " <p><i class='glyphicon glyphicon-user'></i> NCO_10_EX16D : $NCO10EX16D</p> ";
               ?>
            </div>
            </div>
            
        </div>
        
        <div class="col-sm-4">
            <div class="panel panel-default">
            <div class="panel-heading">restore เสร็จแล้ว</div>
            <div class="panel-body">
                <?php echo "รายชื่อทั้งหมด: ".$yesresto; ?>
                
                
            </div>
            
            
            </div></div>
            
        <div class="col-sm-4">
                
                <div class="panel panel-default">
            <div class="panel-heading">จำนวน restore วันนี้   <?php echo Yii::$app->formatter->asDate('now', 'MM-dd-yyyy');?> </div>
            <div class="panel-body">
                <?php echo "รายชื่อทั้งหมด: ".$datexx; ?>
                
                
            </div>
                
                
            </div>
        
        
    </div>
        

</div>
    </div>
</div>