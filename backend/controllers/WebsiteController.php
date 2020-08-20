<?php

namespace backend\controllers;

use Yii;
use app\models\Website;
use app\models\websiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TblDepartment;
use yii\filters\AccessControl;

/**
 * WebsiteController implements the CRUD actions for Website model.
 */
class WebsiteController extends Controller {

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
     * Lists all Website models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new websiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    
    public function actionCapacity() {
        $searchModel = new websiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('capacity', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddcapa($id) {
        $model = $this->findModel($id);
        //$modelSystem = \app\models\TblSystemsoftware::findOne($id);
        // $modelDep = new TblDepartment
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');

          return $this->redirect(['capacity']);
        }
  return $this->renderAjax('_status', [
                    'model' => $model,
        ]);
    }

    //แสดงเป็นiframe 
    public function actionMoniter($ch) {

        $query = Website::find()->where(['status' => $ch]);
        $pagination = new \yii\data\Pagination([
            'defaultPageSize' => 50,
            'totalCount' => $query->count(),
        ]);
        $model = $query->orderBy(['id' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
//        ->orderBy(['ipServer'=>SORT_DESC])
        //if ($ch){  $model = $model->where(['status'=>$ch]); }else{ $model = $model->where(['status' => 1]); }

        return $this->render('moniter', [
                    'model' => $model,
            'pages' => $pagination
        ]);
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Website model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $model = new Website();
        //$modelSystem = \app\models\TblSystemsoftware::findOne($id);
        // $modelDep = new TblDepartment
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            return $this->redirect(['index']);
//            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'modelSystem' => $id,
        ]);
    }

    /**
     * Updates an existing Website model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');

            return $this->redirect(['index']);
        }
        //var_dump($model);
        return $this->render('update', [
                    'model' => $model,
//             'modelSystem' => $modelSystem,
        ]);
    }

    /**
     * Deletes an existing Website model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Website model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Website the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Website::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
