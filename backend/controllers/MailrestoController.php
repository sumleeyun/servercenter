<?php

namespace backend\controllers;

use Yii;
use app\models\tblMailresto;
use app\models\mailrestoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * MailrestoController implements the CRUD actions for tblMailresto model.
 */
class MailrestoController extends Controller {

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
        ];
    }

    /**
     * Lists all tblMailresto models.
     * @return mixed
     */
    public function actionIndex() {
        //$searchModel = new mailrestoSearch();
        //$model = new tblMailresto();
        $restototal = tblMailresto::find()->count();

        $yesresto = tblMailresto::find()->where(['status' => 1])->count();
        $day = date('Y-m-d');
        $datexx = tblMailresto::find()
                ->where(['status' => 1])
                //->andWhere(YEAR(create_y) = $day)
                ->andwhere(['like', 'create_y', $day])
                ->count();
        $FF01EX16A = tblMailresto::find()->where(['dbff' => 'FIRSTOFF_01_EX16A'])->count();
        $FF07EX16A = tblMailresto::find()->where(['dbff' => 'FIRSTOFF_07_EX16A'])->count();
        $FF07EX16B = tblMailresto::find()->where(['dbff' => 'FIRSTOFF_07_EX16B'])->count();
        $FF09EX16A = tblMailresto::find()->where(['dbff' => 'FIRSTOFF_09_EX16A'])->count();
        $FF10EX16 = tblMailresto::find()->where(['dbff' => 'FIRSTOFF_10_EX16'])->count();
        $FF11EX16 = tblMailresto::find()->where(['dbff' => 'FIRSTOFF_11_EX16'])->count();
        $NCO10EX16C = tblMailresto::find()->where(['dbff' => 'NCO_10_EX16C'])->count();
        $NCO10EX16D = tblMailresto::find()->where(['dbff' => 'NCO_10_EX16D'])->count();



        return $this->render('index', [
                    'yesresto' => $yesresto,
                    'datexx' => $datexx,
                    'restototal' => $restototal,
                    'FF01EX16A' => $FF01EX16A,
                    'FF07EX16A' => $FF07EX16A,
                    'FF07EX16B' => $FF07EX16B,
                    'FF09EX16A' => $FF09EX16A,
                    'FF10EX16' => $FF10EX16,
                    'FF11EX16' => $FF11EX16,
                    'NCO10EX16C' => $NCO10EX16C,
                    'NCO10EX16D' => $NCO10EX16D
        ]);
    }

    public function actionSearchall() {
        $searchModel = new mailrestoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new tblMailresto();
        if (Yii::$app->request->post('hasEditable')) {
            $_id = $_POST['editableKey'];
            $model = $this->findModel($_id);
            $out = Json::encode(['output' => $output, 'message' => '']);
            $post = [];
            $posted = current($_POST['model']);
            $post['model'] = $posted;
            if ($model->load($post)) {
                $model->save();
                if (isset($posted['id'])) {
                    $output = $model->note;
                }
                $out = Json::encode(['output' => $output, 'message' => '']);
            }
            echo $out;
            return;
        }




        return $this->render('searchall', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single tblMailresto model.
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
     * Creates a new tblMailresto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new tblMailresto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing tblMailresto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);

            Yii::$app->session->setFlash('success', 'บันทึกรอบการย้อมเรียบร้อยแล้ว');
            return $this->redirect(['searchall']);
            //return $this ->goBack('searchall');
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionTest() {

        $searchModel = new mailrestoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new tblMailresto();
        return $this->render('test', [
                    'searchModel' => $searchModel,
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing tblMailresto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['searchall']);
    }

    /**
     * Finds the tblMailresto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return tblMailresto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = tblMailresto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function finddate($day) {
        $datexx = tblMailresto::find()
                ->where(['status' => 1])
                //->andWhere(YEAR(create_y) = $day)
                ->andwhere(['like', 'create_y', $day])
                ->count();
        return $datexx;
    }

}
