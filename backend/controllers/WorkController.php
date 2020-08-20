<?php

namespace backend\controllers;

use Yii;
use app\models\Tblwork;
use app\models\TblworkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

// WorkController implements the CRUD actions for Tblwork model.

class WorkController extends Controller {

    /**
     * {@inheritdoc}
     */
    /* public function behaviors()
      {
      return [
      'verbs' => [
      'class' => VerbFilter::className(),
      'actions' => [
      'delete' => ['POST'],
      ],
      ],
      ];
      } */

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
                        'actions' => ['index', 'view', 'dashboard'],
                        'allow' => true,
                        'roles' => ['@', '?']//ถ้าไม่มีการ login 
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblwork models.
     * @return mixed
     */
    public function actionIndex() {
        $chk='all';
        $searchModel = new TblworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$chk);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionGetjob() {
        $searchModel = new TblworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1);

        return $this->render('getjob', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
    
    
    public function actionDashboard() {
        $searchModel = new TblworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('dashboard', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblwork model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $modelServer = new \app\models\TblServerall();

        $model = $this->findModel($id);
        if ($model->server_ip){
        $query = \app\models\TblServerall::find()->where(['systemsoftware_id' =>$model->server_ip ]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'IpServer' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);
        }else{$dataProvider ='';}
        return $this->render('view', [
                    'model' => $model, 'dataProvider' => $dataProvider
        ]);
    }

// สร้างฟังก์ชั่นอัพโหลดทีละหลายๆ ไฟล์
    private function uploadSingleFile($model, $tempFile = null) {
        $file = [];
        $json = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model, 'covenant');
            if ($UploadedFile !== null) {
                $oldFileName = $UploadedFile->basename . '.' . $UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename . time()) . '.' . $UploadedFile->extension;
                $UploadedFile->saveAs(Freelance::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
                $file[$newFileName] = $oldFileName;
                $json = Json::encode($file);
            } else {
                $json = $tempFile;
            }
        } catch (Exception $e) {
            $json = $tempFile;
        }
        return $json;
    }

    //ฟังชั่นนี้ก็ง่ายๆ เอาไว้สำหรับสร้าง folder ไว้เก็บไฟล์ในแต่ละ id เพื่อให้แยกไฟล์ได้เป็นระเบียบและเพื่อการค้นหาด้วย
    private function CreateDir($folderName) {
        if ($folderName != NULL) {
            $basePath = Freelance::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

    /**
     * Creates a new Tblwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Tblwork();

        if ($model->load(Yii::$app->request->post())) {
            $model->Status = 1;

            $this->CreateDir($model->ref);

            $model->covenant = $this->uploadSingleFile($model);


            if ($model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
            } else {
                $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tblwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $tempCovenant = $model->covenant;
        
        if ($model->load(Yii::$app->request->post())) {
            $model->covenant = $this->uploadSingleFile($model, $tempCovenant);
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tblwork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tblwork::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
