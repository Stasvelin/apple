<?php 
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Eat form
 */



class EatForm extends Model
{
    public $percent;
    public $maxValue;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['persent', 'required'],
            ['percent','number','min'=>0,'max'=>$this->maxValue],
        ];
    }
    
    public function attributeLabels()
    {
        return ['percent'=>'Сколько процентов съесть'];
    }
}