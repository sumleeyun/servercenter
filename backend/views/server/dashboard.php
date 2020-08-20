<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="box box-solid box-default">
            <div class="box-header">
                <h3 class="box-title">ระบบงานประจำเดือน</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                
                <?php





$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-serverall-index">


   

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'persistResize' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-hover ',
        ],
        'columns' => [
            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            //'chkstatus',
            
            'IpServer',
            'mapWithWapple:ntext',
            /*[
                'attribute' => 'IpServer',
                'value' => function($model) {
                    return $model->title . $model->firstname . ' ' . $model->lastname;
                }
            ]*/

            'TypeServer:ntext',
            'OS:ntext',
            //'program:ntext',
            //'computerName:ntext',
            //'hardware:ntext',
            'systemsoftware.systemname',
            'systemsoftware.pmvusers',         
            'Description:ntext',
            //'tool:ntext',
            //'servicePort:ntext',
            //'subnetMask:ntext',
            //'gateway:ntext',
            //'status:ntext',
            //'user:ntext',
            //'pw:ntext',
            //'userPwAnother:ntext',
            //'remak1:ntext',
            //'remark2:ntext',
            //'adminServer:ntext',
            'created_by',
            'updated_at',
            
            
        ],
    ]);
    ?>
</div>

                
                

            </div><!-- /.box-body -->
        </div><!-- /.box -->