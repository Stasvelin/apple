<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\UserException;

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
    public $id
    ,$цвет
    ,$датаПоявления
    ,$датаПадения
    ,$состояние
    ,$остаток;
    
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
        $this->цвет = rand(0,3);
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

}
