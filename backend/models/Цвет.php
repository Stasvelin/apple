<?php
namespace backend\models;

class Цвет extends Classifier{
    static public function all(){
        return [
            0=>'зелёный', 
            1=>'жёлтый',
            2=>'красный',
        ];
    }
}