<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\UserException;
use yii\helpers\Url;

/**
 * Класс-модель яблок
 *
 * @property int $id
 * @property int $цвет
 * @property int $датаПоявления
 * @property int $датаПадения
 * @property int $состояние  
 * @property int $остаток
 */
class Apple extends ActiveRecord
{
    /*
    public $id
    ,$цвет
    ,$датаПоявления
    ,$датаПадения
    ,$состояние
    ,$остаток;
    */
    const СРОК_ГОДНОСТИ = 5*3600;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'яблоко';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['цвет', 'датаПоявления', 'остаток'], 'required'],
            [['цвет', 'датаПоявления', 'остаток'], 'integer'],
            [['цвет', 'датаПоявления', 'остаток'], 'safe'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'цвет' => 'Цвет',
            'датаПоявления' => 'Дата появления',
            'датаПадения' => 'Дата падения',
            'состояние' => 'Состояние',
            'остаток' => 'Остаток',
        ];
    }
    
    public function init()
    {
        if($this->id > 0) return;
        $this->цвет = rand(0,2);
        $this->датаПоявления = time() - rand(0,3600*24*30);
        $this->остаток = 100;
        $this->состояние = 0; //висит на ветке
    }

    public function упасть(){
        if ($this->состояние > 0){ //Уже упало
            throw new UserException('Ошибка: попытка сбросить уже упавшее яблоко');
            return false;
        }
        $this->состояние = 1;
        $this->датаПадения = time();
    }
    
    public function съесть($процент){
        if ($this->состояние == 0){ //на дереве
            throw new UserException('Ошибка при попытке съесть яблоко: невозможно съесть яблоко, ещё не упавшее');
            return false;
        }
        $this->проверитьСвежесть();
        if ($this->состояние == 2){ //испортилось
            throw new UserException('Ошибка при попытке съесть яблоко: невозможно съесть испортившееся яблоко');
            return false;
        }
        if ($this->состояние == 3){ //съедено
            throw new UserException('Ошибка при попытке съесть яблоко: яблоко уже полностью съедено');
            return false;
        }
        $процент = (int) $процент;
        $процент = $процент < 0 ? 0 : $процент > $this->остаток ? $this->остаток : $процент;
        $this->остаток -= $процент;
        if ($this->остаток == 0) $this->состояние = 3;
    }
    
    protected function проверитьСвежесть(){
        if($this->состояние == 1){
            if($this->датаПадения < time() - self::СРОК_ГОДНОСТИ){
                $this->состояние = 2;                
            }
        }
    }

    public function getListEntryData(){
        $data = [];
        $data['title'] = 'Яблоко '.ЦветСредний::one($this->цвет);
        $data['ID'] = $this->id;
        $data['Cостояние'] = Состояние::oneH($this->состояние);
        $data['Дата появления'] = 
        Yii::$app->Formatter->asDate($this->датаПоявления, 'dd.MM.yyyy H:i'); 
        if ($this->состояние == 1){
            $data['Дата падения'] = 
            Yii::$app->formatter->asDate($this->датаПоявления, 'dd.MM.yyyy H:i')."(".
            Yii::$app->formatter->format($this->датаПоявления,'relativeTime').")";
        }
        if ($this->состояние == 1){
            $data['Остаток'] = $this->остаток.'%';
        }
        $data['addLinks'] = [];
        if ($this->состояние > 1){
            $data['addLinks']['Удалить'] = 'apple/delete';
        }
        if ($this->состояние == 0){
            $data['addLinks']['Сбросить'] = 'apple/drop';
        }
        
        return $data;
    }
    
    public function getЦвет(){
        return Цвет::one($this->цвет);
    }
}
