<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Яблоневый сад - Главная';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">Для управления яблоками войдите на сайт. Используйте логин test, пароль test</p>
        
        <p>
                <?= Html::a("Войти", ['/backend/site/login'],['class' => 'btn btn-lg btn-success']); ?>
                </p>
    </div>

    <div class="body-content">

        

    </div>
</div>
