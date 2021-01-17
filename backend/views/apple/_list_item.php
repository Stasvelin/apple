<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\EatForm;

$data = $model->getListEntryData();
if (isset($data['href'])){
    ?><a href=<?= $data['href'] ?>><?php
}
?>
<div class='элементСписка'>
<p class='заголовок'><?= $data['title'] ?></p>



<?php 
unset ($data['title']);
unset ($data['href']);
$addLinks = $data['addLinks'];
unset ($data['addLinks']);

foreach ($data as $l=>$v){
    ?>
    <p class='параметр'>
            <font class='имяПараметра'><?= Html::encode($l) ?>: </font>
            <font class='значениеПараметра'><?= Html::encode($v) ?></font>
    </p>
    <?php 
}
    ?><p class='параметр'><?php 
    foreach ($addLinks as $label=>$route){
        
        echo Html::a($label, $route, ['class' => 'ссылка', 'onclick' => "return $label({$model->id})"]);
    }
    ?></p>
    <?php if($model->состояние == 1){?>
  <div class="eat-form" id=eat-form<?=$model->id?> style='display: none'>

    <?php
    $modelEat = new EatForm();
    $modelEat->maxValue = $model->остаток;
    
    $form = ActiveForm::begin([
        'action' => ['eat','id'=>$model->id],
        'method' => 'get',
    ]); ?>

    <?= $form->field($modelEat, 'percent')->textInput(['maxlength' => true]) ?>

    <div>
        <?= Html::submitButton('Съесть', ['class' => 'btn-s btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>  
<?php }?>
</div>
<?php if (isset($data['href'])){
    ?></a><?php
}