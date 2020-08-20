<?php

namespace backend\controllers;

use Yii;
use app\models\TblSystemsoftware;
use app\models\systemsoftwareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * SystemsoftwareController implements the CRUD actions for TblSystemsoftware model.
 */
class SystemsoftwareController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delteamwork' => ['POST'],
                //'update' => ['POST'],
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
                    //'matchCallback' => function($rule, $action){)
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
     * Lists all TblSystemsoftware models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new systemsoftwareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSystemsoftware model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\Teamwork::find()->where(['system_id' => $id]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);

        $dataProServer = new ActiveDataProvider([
            'query' => \app\models\TblServerall::find()->where(['systemsoftware_id' => $id]),
            'sort' => [
                'defaultOrder' => [
                    'IpServer' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);
        //ระบบงานที่ใช้ webhosting DC
        $dataWebHosting = new ActiveDataProvider([
            'query' => \app\models\Website::find()->where(['product_id' => $id]),
            'sort' => [
                'defaultOrder' => [
                    //'IpServer' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);
        
       //ระบบงานที่ใช้ accout
        $dataSw = new ActiveDataProvider([
            'query' => \app\models\TblUserSystem::find()->where(['software_id' => $id]),
            'sort' => [
                'defaultOrder' => [
                    //'IpServer' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);
        
        
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'dataProvider' => $dataProvider, 
                    'dataProServer' => $dataProServer,
                    'dataWebHosting' => $dataWebHosting,
                    'dataSw' => $dataSw,
        ]);
    }

    /*
ส่งเมล์ ให้กับเจ้าหน้าที่ ที่ติดต่องาน สร้าง VM
     * 
     *      */
    public function actionReport($id) {
        
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\TblServerall::find()->where(['systemsoftware_id' => $id]),
            'sort' => [
                'defaultOrder' => [
                    'IpServer' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
        ]);
       
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'dataProvider' => $dataProvider, 
//                    'dataProServer' => $dataProServer,
//                    'dataWebHosting' => $dataWebHosting,
        ]);
    }
    
    
    
    public function actionSentMail(){
        
         Yii::$app->mailer->compose(['html' => 'signupConfirm-html', 'text' => 'signupConfirm-text'], ['user' => $user]) //สามารพเลือกเฉพาะ html หรือ text ในการส่ง
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ''])
                    ->setTo($user->email)
                    ->setSubject('ยืนยันผู้ใช้งาน ' . \Yii::$app->name)
                    ->send();
    }

        /**
     * Creates a new TblSystemsoftware model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TblSystemsoftware();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->photo) {
                $model->photo = $model->upload($model, 'photo');
            }

            $model->save();
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
           
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionTeamwork($id) {
        $model = new \app\models\Teamwork();

        if ($model->load(Yii::$app->request->post())) {
            $model->system_id = $id;
            $model->save();

            //Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['view', 'id' => $model->system_id]);
        }

        return $this->renderAjax('teamwork', [
                    'model' => $model,
        ]);
    }

    
    
    
    public function actionDelteamwork($id) {
        $modelT = \app\models\Teamwork::findone($id);
        $modelT->delete();

        return $this->redirect(['view', 'id' => $modelT->system_id]);
    }

    
    public function actionAccount($id,$chk) {
        $model = new \app\models\TblUserSystem();

        if ($chk=='DEL'){
            $model= \app\models\TblUserSystem::findOne($id);
            $model->delete();
            return $this->redirect(['view', 'id' => $model->software_id]);
            
        }
        
        if ($chk =='update'){
            
            $model= \app\models\TblUserSystem::findOne($id);
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->software_id = $id;
            $model->save();
            //$model->refresh();

            //Yii::$app->response->format = 'json';

            //return ['message' => Yii::t('app','Success Update!'), 'id'=>$model->software_id];
            //Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['view', 'id' => $model->software_id]);
        }

        return $this->renderAjax('account', [
                    'model' => $model,
        ]);
    }
    
    
    
    /**
     * Updates an existing TblSystemsoftware model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
          return $this->redirect(['view', 'id' => $model->id]);
          } 



       /* if ($model->load(Yii::$app->request->post())) {
            //$model->photo = $model->upload($model, 'photo');
            //var_dump($model);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                echo 'Failed!';
            }*/


            //return $this->redirect(['view', 'id' => $model->id]);
        //}

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblSystemsoftware model.
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
     * Finds the TblSystemsoftware model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSystemsoftware the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblSystemsoftware::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
