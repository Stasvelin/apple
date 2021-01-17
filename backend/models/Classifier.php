<?php
namespace backend\models;
/**
 * Простой классификатор для данных на сайте без использования таблиц БД и других хранилищ
 * *
  */
abstract class Classifier{
    
    /**
     * Возвращает название объекта по его индексу
     * @param integer $index код объекта
     * @return string название класса или $index если такого класса нет в классификаторе
     */
    static public function one($index){
        $classname = static::class;
        $a = $classname::all();
        if (isset($a[$index])){
            return $a[$index];
        }
        else{
            return $index;
        }
    }
    
    /**
     * Возвращает название объекта сзаглавной буквы по его индексу
     * @param integer $index код объекта
     * @return string название класса или $index если такого класса нет в классификаторе
     */
    static public function oneH($index){
        return self::mb_ucfirst(self::one($index)); 
    }
    
    /**
     * Возвращает классификатор - массив, сопоставляющий код объекта и его название
     * @return string array 
     */
    static public function all(){
        return [];
    }
    
    static protected function mb_ucfirst($string, $enc = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) .
        mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }
}