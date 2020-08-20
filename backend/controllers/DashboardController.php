<?php

namespace backend\controllers;

use Yii;
use app\models\TblServerall;
use app\models\ServerallSearch;
use app\models\serverUser;
use app\models\serverSoftware;
use app\models\TblSystemsoftware;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Datastore;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * ServerallController implements the CRUD actions for TblServerall model.
 */
class DashboardController extends Controller {

    /**
     * {@inheritdoc}
     */
    public $items;

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delstatus' => ['POST'],
                    'delsw' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'admin', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['admin', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'], //ทำการล้อกอินเท่านั้น
                    /* 'matchCallback'=> function($rule,$action){


                      } */
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['@']//ถ้าไม่มีการ login 
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all TblServerall models.
     * @return mixed
     */
    /* public function actionIndex()
      {
      $dataProvider = new ActiveDataProvider([
      'query' => TblServerall::find(),
      ]);

      return $this->render('index', [
      'dataProvider' => $dataProvider,
      ]);
      } */


    public function actionIndex() {

        $datasys = new ActiveDataProvider([
            'query' => TblSystemsoftware::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $dataword = new ActiveDataProvider([
            'query' => \app\models\Tblwork::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);


        return $this->render('index', [
                    'datasys' => $datasys,
        ]);
    }

//    public function actionIndex() {
//        $searchModel = new ServerallSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        return $this->render('index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider
//        ]);
//    }

    public function actionDetail() {
        $searchModel = new \app\models\ProgramdetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$qurey = \app\models\Programdetail::find()->all();
        /* $dataProvider = new ActiveDataProvider([
          'query' => $qurey,
          /*'sort' => [
          'defaultOrder' => [
          'id' => SORT_DESC,
          //'title' => SORT_ASC,
          ]
          ],
          ]); */

        return $this->render('detail', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionHardware() {
        $model = new TblServerall();
        $searchModel = new ServerallSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $errot = "";
        if (Yii::$app->request->post('hasEditable')) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $_id = $_POST['editableKey'];
//            $errot = Yii::$app->request->post('hasEditable');
//            var_dump($_id);
            $model = $this->findModel($_id);
            $post = [];
            $posted = current($_POST['DebitOpd']);
            $post['DebitOpd'] = $posted;
            if ($model->load($post)) {
                //  $model->save();
                if (isset($posted['harddisk'])) {
                    $output = $model->harddisk;
                }
                $out = Json::encode(['output' => $output, 'message' => '']);
            }


            echo $out;
            return;
        }



        return $this->render('hardware', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
//          'errot' => $errot,
        ]);
    }

    /**
     * Displays a single TblServerall model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        $model = $this->findModel($id);
        //$modelWebsite = new \app\models\Website();
        $dataProviderWebsite = new ActiveDataProvider([
            'query' => \app\models\Website::find()->where(['ipServer' => $id]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);

        $dataProviderProgram = new ActiveDataProvider([
            'query' => \app\models\ProgramDetail::find()->where(['ipaddress' => $id]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);


        //$model_sys = TblSystemsoftware::findOne($model->systemsoftware_id);
        return $this->render('view', [
                    'model' => $model,
                    'dataProviderWebsite' => $dataProviderWebsite,
                    'dataProviderProgram' => $dataProviderProgram,
        ]);
    }

    /**
     * Creates a new TblServerall model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TblServerall();


        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['view', 'id' => $model->IpServer]);
        }

        return $this->render('create', [
                    'model' => $model, //'software' => $software,
        ]);
    }

    /**
     * Updates an existing TblServerall model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
//$software = $this->findModel($id);
//$model->items = serverSoftware::find()->where(['server_id' => $model->IpServer])->all();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

//$items = $software->load(Yii::$app->request->post());
// $items = Yii::$app->request->post();
//var_dump($items['TblServerall']['items']);

            /* foreach ($items['TblServerall']['items'] as $key => $val) { //นำรายการสินค้าที่เลือกมา loop บันทึก
              if (empty($val['server_id'])) {
              $server_detail = new serverSoftware();
              } else {
              $server_detail = serverSoftware::findOne($val['IpServer']);
              }
              $server_detail->server_id = $model->IpServer;


              $server_detail->server_id = $model->IpServer;
              $server_detail->prog_id = $val['prog_id'];
              $server_detail->user = $val['user'];
              $server_detail->password = $val['password'];
              $server_detail->port = $val['port'];
              $server_detail->note = $val['note'];
              $server_detail->save();



              }

             */

            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['view', 'id' => $model->IpServer]);
        }

//Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
        return $this->render('create', [
                    'model' => $model, //'software' => $software,
        ]);
    }

    /**
     * Deletes an existing TblServerall model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /*
     * 
     * 
      อัพเดพสถานะโปรแกรม
     */

    public function actionStatus() {
        $model = new \app\models\Status();
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\status::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);

//if (Yii::$app->request->isAjax) {
        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($model->load(Yii::$app->request->post())) {

            $model->save();

            return $this->redirect(['status']);
        }

//}else{


        return $this->renderAjax('_status', [
                    'model' => $model, 'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelstatus($id) {
        $modelT = \app\models\Status::findone($id)->delete();

        return $this->redirect(['status']);
    }

    /*
     *  บันทึกรายละเอียดโปรแกรม
     * 
     *  */

    public function actionSoftware($id) {
        $model = new \app\models\Programdetail();
        if ($model->load(Yii::$app->request->post())) {


            $model->ipaddress = $id;
            $model->save();

            //Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->renderAjax('software', [
                    'model' => $model,
        ]);
    }

    public function actionDelsw($id, $chk) {
        switch ($chk) {
            case 'PROGRAM':
                $model = \app\models\Programdetail::findone($id);
                $IP = $model->ipaddress;
                break;

            case 'WEBSITE':
                $model = \app\models\Website::findOne($id);

                $IP = $model->ipServer;
                break;

            default: $role = "'No Role Selected'";
                break;
        }
        $model->delete();

        return $this->redirect(['view', 'id' => $IP]);
    }

//    websit
    public function actionWebsite($id) {
        $model = new \app\models\Website();


        if ($model->load(Yii::$app->request->post())) {
            $model->ipServer = $id;
            $model->status = "1";

            $model->save();

            //Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->renderAjax('website', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the TblServerall model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblServerall the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblServerall::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
