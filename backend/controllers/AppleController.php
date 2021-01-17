<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use backend\models\Apple;
use yii\data\ActiveDataProvider;

/**
 * Apple controller
 */
class AppleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [ 'index', 'delete', 'update', 'create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    
    public function actionIndex()
    {
        $query = Apple::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
              
        return $this->render('index', [
             'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate(){
        $model = new Apple();
        //$model->load(["цвет" => rand(0,2), "датаПоявления" => time() - rand(0,3600*24*30),"остаок" => 100]);
        if ($model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }
        else{
            echo "Ошибка сервера";
        }
        
    }
    
}
