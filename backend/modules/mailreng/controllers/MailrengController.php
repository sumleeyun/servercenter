<?php

namespace backend\modules\mailreng\controllers;

use Yii;
use backend\modules\mailreng\models\Dboidguser;
use backend\modules\mailreng\models\DboiduserSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * MailrengController implements the CRUD actions for Dboidguser model.
 */
class MailrengController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'change' => ['POST'],
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
     * Lists all Dboidguser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DboiduserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//if(Yii::$app->request->queryParams == NULL){
//        
//        $dataProvider->query->where(['pmvusers' => '79']);
//    }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddmail()
    {
        $searchModel = new \app\models\idgRTAFPersonsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//if(Yii::$app->request->queryParams == NULL){
//        
//        $dataProvider->query->where(['pmvusers' => '79']);
//    }
        return $this->render('addmail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    public function actionAdduser()
    {
        $searchModel = new DboiduserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//if(Yii::$app->request->queryParams == NULL){
//        
        $dataProvider->query->where(['ADStatus' => '1']);
//    }
        return $this->render('adduser', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Dboidguser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dboidguser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idCare,$idGvm)
    {
        $model_Urtaf = 
        $model = new Dboidguser();
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    
     public function actionChange($id,$chk)
    {
        $model = new \app\models\mailCapa();

       // if ($model->load(Yii::$app->request->post())) {
            $model->username = $id;
            $model->chk = 1;
            $model->save();
            
           return $this->redirect(['index']);
        //}
    }

       

    
    
    /**
     * Updates an existing Dboidguser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dboidguser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dboidguser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dboidguser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dboidguser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
