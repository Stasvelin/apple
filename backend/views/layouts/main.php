<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->title = 'Управление яблоками';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
body {
    font-family: "PT Root UI",Roboto,Helvetica,sans-serif;
    padding: 20px;
}
.шапка {
    padding: 10px;
}
.основнойБлок{
    display:inline;
    float:left; 
    padding: 10px;
}
p {

}
a {
color: black;
}
a.hover {
color: blue;
}
#главноеОкно{
    padding-left:80px;
}
.элементСписка{
background: #cdf;
border-radius: 10px;
padding:15px;
margin:15px;
box-shadow: 6px 6px 6px 0 #ccc;
}
.элементСписка .заголовок{
    font-size: 13px;
    font-weight: bold;
    
}
.элементСписка p{
    font-size: 11px;
    margin: 3px;
}
.элементСписка .параметр{
    
}
.элементСписка .параметр .имяПараметра{
    font-weight: bold;
}
.элементСписка .параметр .значениеПараметра{

}
.полеВвода{
background: white;
border-radius: 8px;
border: 1px solid grey; /* Белая рамка */
margin-top: 10px;
margin-bottom: 10px;
}

.полеВвода input{
border: 0px;
}

.полеВвода:hover{
background-color: #eee;

}

</style>            
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Начало', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ВОЙТИ', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'ВЫЙТИ (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
