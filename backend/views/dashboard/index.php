<?php
/* @var $this yii\web\View */

use yii\widgets\DetailView;
use kartik\grid\GridView;

$this->title = 'Disboard';

?>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="box box-solid box-info">


    <div class="box-header">
        <h3 class="box-title">ระบบงานทั้งหมด</h3>
    </div><!-- /.box-header -->
    <div class="box-body">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">ทั้งหมด</a></li>
            <li><a data-toggle="tab" href="#menu1">นขต.ทอ.</a></li>
            <li><a data-toggle="tab" href="#menu2">ศคพ.ทอ.</a></li>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <?=
                GridView::widget([
                    'dataProvider' => $datasys,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'systemname',
                        'systemENG',
                        'unitrtaf.nameDepartment',
                        'system_dayjob',
                        [
                            'label' => 'หนังสือ',
                            'value' => function ($datasys, $key, $index) {
                                return $datasys->work ? $datasys->work->eadmin_sn : "ไม่มีหนังสือ";
                            }
                        ],
                    ],
                ]);
                ?>
            </div>
            <div id="menu1" class="tab-pane fade">


            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Some content in menu 2.</p>
            </div>
        </div>      


    </div>
</div>
<div class="box box-solid box-info">
    <div class="box-header">
        <h3 class="box-title">server</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php $typeserv="VM";  ?>
        <div class="col-md-4">SERVER ทั้งหมด : <?php echo \app\models\TblServerall::find()->count();   ?>  </div>   
        <div class="col-md-4">VM :<?php echo \app\models\TblServerall::find()->where(['server_type_id'=> 1])->count();   ?> </div>  
        <div class="col-md-4">COLO : <?php echo \app\models\TblServerall::find()->where(['server_type_id'=> 3 ])->count();   ?> </div>  
        <div class="col-md-4">web server : </div>  
        <div class="col-md-4">mail server : </div>  

    </div>
</div>
<div class="box box-solid box-info">
    <div class="box-header">
        <h3 class="box-title">web site</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="col-md-4">web ทั้งหมด :<?php echo app\models\Website::find()->count();  ?> </div>  
        <div class="col-md-4">ON : <?php echo app\models\Website::find()->where(['status'=> 1])->count();  ?> </div>
        <div class="col-md-4">Down: <?php echo app\models\Website::find()->where(['status'=> 0])->count();  ?> </div> 
        <div class="col-md-4">รอลบ: <?php echo app\models\Website::find()->where(['status'=> 3])->count();  ?> </div> 
        <div class="col-md-4">โดนแฮก: <?php // echo app\models\Website::find()where(['status'=> 1])->count();  ?> </div>
        <div class="col-md-4">update version: </div>
    </div>
</div>