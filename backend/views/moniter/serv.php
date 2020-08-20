
<?php
    header("refresh: 60;");
?>


<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

//$time = time();
//echo Yii::$app->formatter->asDateTime($time, 'kk:mm:ss');
$host = "10.107.1.200";
date_default_timezone_set("Asia/Bangkok");
    $day=date("H");
    
echo "The time is " . $day;

//exec("ping -c 4 " . $host, $output, $result);

?>

<h3>moniter AD 200</h3>
<p>
<?= Html::a('ping', ['serv'], ['class' => 'btn btn-success']) ?>
</p>


<div class="panel panel-primary">
    <div class="panel-heading">Monitor AD <?php echo $host; ?></div>
    <div class="panel-body">     <?php
        foreach ($output as $key => $name) {
            print "<p>$output[$key]</p>";
           
        }

        //print_r($output)
        ?> </div>
</div>

<?php if ($result == 0): ?>
    <br>
    <button type="button" class="btn btn-success">ping successful</button>

<?php else: ?>
    <button type="button" class="btn btn-danger">Ping unsuccessful!</button>

<?php endif; ?>      

 <?php

if($day==06){
   if($chk==0){
        $chk++;

$subject="moniter AD 200";
$emailto="support@rtaf.mi.th";
$header = "From:servermoniter@rtaf.mi.th";
$emailfrom="webmarter@rtaf.mi.th";
$send_mail = mail($emailto,$subject,implode("\r\n", $output),$header);
if(!$send_mail)
{
        echo"ยังไม่สามารถส่งเมลล์ได้ในขณะนี้";
}
        else
        {
            echo "ส่งเมลล์สำเร็จ";
        }
   }
        $chk=0;
   }
   //echo $chk;
//}
/*Yii::$app->mailer->compose()
    ->setFrom('xxx@domain.com')
    ->setTo('sumlee_y@rtaf.mi.th')
    ->setSubject('Message subject')
    ->setTextBody('Plain text content')
    ->setHtmlBody('<b>HTML content</b>')
    ->send();
    */

    ?>


