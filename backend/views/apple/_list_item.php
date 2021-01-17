<?php
use yii\helpers\Html;
use yii\helpers\Url;

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
        
        echo Html::a($label, $route, ['class' => 'ссылка']);
    }
    ?></p>
    
</div>
<?php if (isset($data['href'])){
    ?></a><?php
}