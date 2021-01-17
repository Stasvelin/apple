<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $searchModel app\models\МодульSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список яблок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать яблоко', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

     <?=
    \yii\widgets\ListView::widget([
         'dataProvider' => $dataProvider,
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => '_list_item']);

    ?>


</div>
<script>
function Откусить(id){
	$("#eat-form"+id).slideToggle();
	return false;
}

function Сбросить(id){
	return true;
}

function Удалить(id){
	return true;
}
</script>
