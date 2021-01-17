<?php
namespace backend\models;

class ЦветСредний extends Classifier{
    static public function all(){
        return [
            0=>'зелёное',
            1=>'жёлтое',
            2=>'красное',
        ];
    }
}