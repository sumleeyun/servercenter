<?php 

namespace backend\controllers;

use Yii;
use app\models\network;
use app\models\networkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class SearchController extends Controller
{
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
                        'roles' => ['@'],//ทำการล้อกอินเท่านั้น
                        /*'matchCallback'=> function($rule,$action){
            
            
                        }*/
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
     * Lists all network models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new networkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}