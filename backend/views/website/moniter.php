<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model app\models\Website */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Websites', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="website-view">

    

    <p>
        <?php 
        $show = app\models\Status::find()->all();
        foreach ($show as $rs){
        ?>
        <?= Html::a($rs->name, ['moniter', 'ch' => $rs->id], ['class' => 'btn btn-primary']) ?>
        <?php }?>
        <?php // Html::a('active', ['moniter', 'ch' => '2'], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <div class="row">
             <?php foreach ($model as $rows){ ?>
            <div class="col-sm-2">
                <?php 
                $ip = gethostbyname($rows->URL); 
                $ipsver=$rows->ipServer;
               
                if($ip==$ipsver){
                
                ?>
                <p class ="small bg-info"><a href="<?php echo $rows->domainName; ?>"> <?php echo  $rows->URL; ?></a></p>
                <p><?php echo "IP:".$ip ;?></p>
               <iframe src="<?php //echo $rows->domainName; ?>"  width="200" height="100" align="center" margin="auto" frameborder="0" allowfullscreen="allowfullscreen"></iframe> 
               <p></p>    
                <?php }else{ 
                    echo "DNS:".$rows->URL;
                    echo " <br> NOT NULL IP:".$ip ;
                    
                }?>
            </div>
           <?php  }?>
        
           
    </div>
   
    <div class="row">
        
      <?php echo LinkPager::widget([
    'pagination' => $pages  
]); ?>  
        
    </div>        

            
</div>
