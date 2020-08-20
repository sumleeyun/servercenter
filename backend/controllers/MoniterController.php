<?php

namespace backend\controllers;

use Yii;
use app\models\Website;

class MoniterController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionServ() {
        $host = "10.107.1.200";

           exec("ping -c 4 " . $host, $output, $result);



            return $this->render('serv', [
                        'host' => $host,
                        
                        'result' => $result,
                        'output' => $output
        ]);
    }

    
    public function actionWeb($url) {
        
        return $this->render('web', [
                    'model' => $this->findModel($url),
            
        ]);
        
    }
}
