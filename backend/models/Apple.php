<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

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

}
