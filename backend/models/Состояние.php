<?php
namespace backend\models;

class Состояние extends Classifier{
    static public function all(){
        return [
            0=>'висит на ветке',
            1=>'упало, лежит на земле',
            2=>'испортилось',
            3=>'полностью съедено',
        ];
    }
}