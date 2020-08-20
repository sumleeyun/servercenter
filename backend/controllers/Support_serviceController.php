<?php

namespace backend\controllers;

use Yii;
use app\models\support_service;
use app\models\support_serviceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * Support_serviceController implements the CRUD actions for support_service model.
 */
class Support_serviceController extends Controller {

    /**
     * {@inheritdoc}
     */
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
     * Lists all support_service models.
     * @return mixed
     */
    public function actionIndex() {
        $acc = Yii::$app->user->identity->username;
        $searchModel = new support_serviceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1,$acc);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport() {
        
        //$query = support_service::find();
        //$query->andFilterWhere(['request_id' => 'satawat_c'])
                //->select(['type_id','request_id'])
        //        ->groupBy(['type_id']);
        $acc='ALL';
        
        
        $searchModel = new support_serviceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,2,$acc);

        /*$dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);*/
     //$model = support_service::find()->where($condition);

        return $this->render('report', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    
        ]);
    }

    public function actionAdd() {
        
        $searchModel = new \app\models\support_service_suptypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
if(Yii::$app->request->queryParams == NULL){
        
        $dataProvider->query->where(['type_id' => 1]);
    }
       

        return $this->render('add', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    
        ]);
    }
    
    
    public function actionSubtype($id) {
        $model = new \app\models\support_service_subtype();
        if ($model->load(Yii::$app->request->post())) {
     
            
             $model->type_id = $id;
             $model->save();
       
            //Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['add', 
//                'id' => $id
                    ]);
        }

        return $this->renderAjax('subtype', [
                    'model' => $model,
        ]);
    }
    
    
    public function actionDashboard($ch) {
        // $searchModel = new support_serviceSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = support_service::find();
        switch ($ch) {
            case 'D':
                $q_date = date('Y-m-d');
                $query->andFilterWhere(['like', 'request_date', $q_date])
                        //->select(['type_id','request_id'])
                        ->groupBy(['type_id']);
                break;
            case 'M':
                $q_date = date('y-m');
                $query->andFilterWhere(['like', 'request_date', $q_date]);
                //->select(['type_id','request_id'])
                //->groupBy(['request_id']);
                break;
            case 'U':
                //$query->andFilterWhere(['like', 'request_date',$q_date ]);
                //->select(['type_id','request_id'])
                $query->groupBy(['request_id']);
                break;
            default:
                echo "i is not equal to 0, 1 or 2";
        }
        //$q_date = date('Y-m-d');




        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        //$modeltype = \app\models\support_service_type::find()->all();    


        return $this->render('dashboard', [
                    //'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'ch' => $ch,
        ]);
    }

    /**
     * Displays a single support_service model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new support_service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $model = new support_service();
        $modelsubtype = \app\models\support_service_subtype::findOne($id);
//        if (($modelsubtype = \app\models\support_service_subtype::findOne($id)) !== null) {
//            $model->type_id = $modelsubtype->type_id;
//            $model->subtype_id = $modelsubtype->subtype_id;
//            $model->save();
//            return $this->redirect(['view', 'id' => $model->service_id]);
//        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
return $this->redirect(['index']);            
//return $this->redirect(['view', 'id' => $model->service_id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'modelsubtype' => $modelsubtype,
            
        ]);
    }

    /**
     * Updates an existing support_service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
// $modelsubtype = \app\models\support_service_subtype::find();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->service_id]);
        }

        return $this->render('update', [
                    'model' => $model,
             'modelsubtype' => '',
        ]);
    }

    /**
     * Deletes an existing support_service model.
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
     * Finds the support_service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return support_service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = support_service::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
