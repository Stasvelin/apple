<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use common\models\LoginForm;
use backend\models\Apple;

/**
 * Test controller
 * ��� �������� ������� ������ Apple 
 */
class TestController extends Controller
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
                         'actions' => [ 'index', 'error1', 'error2'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $apple = new Apple();
        echo "Цвет: $apple->цвет <br>";
        $apple->упасть();
        echo "Упасть<br>";
        $apple->съесть(50);
        echo "Съесть(50)<br>";
        echo "Остаток: $apple->остаток <br>";
        $apple->съесть(60);
        echo "Съесть(50)<br>";
        echo "Остаток: $apple->остаток <br>";
    }
    
    public function actionError1()
    {
        $apple = new Apple();
        echo "Цвет: $apple->цвет <br>";
        $apple->упасть();
        echo "Упасть<br>";
        $apple->съесть(25);
        echo "Съесть(25)<br>";
        echo "Остаток: $apple->остаток <br>";
        $apple->упасть();
        echo "Упасть<br>";
    }
    
    public function actionError2()
    {
        $apple = new Apple();
        echo "Цвет: $apple->цвет <br>";
        $apple->упасть();
        echo "Упасть<br>";
        $apple->съесть(70);
        echo "Съесть(70)<br>";
        echo "Остаток: $apple->остаток <br>";
        $apple->съесть(70);
        echo "Съесть(70)<br>";
        echo "Остаток: $apple->остаток <br>";
        $apple->съесть(70);
        echo "Съесть(70)<br>";
        echo "Остаток: $apple->остаток <br>";
        
    }
    
}
