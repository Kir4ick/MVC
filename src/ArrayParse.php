<?php

namespace Src;

class ArrayParse
{
    private function __construct(){}

    //Рекурсивная функция для вывода ассоциативного массива
    public static function parseInKeysArray(array $array){
        foreach ($array as $key => $value){
            if(is_array($value)){
               echo $key.':{';
               if(self::isAssoc($value)){
                   self::parseInKeysArray($value);
               }else {
                    self::parseArr($value);
               }
               continue;
            }
            echo $key.': {'.$value.'}';
        }
    }

    //Проверка на ассоциативность
    public static function isAssoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    //Вывод обычного массива
    public static function parseArr(array $array){
        foreach ($array as $value){
            if(is_array($value)){
                self::parseArr($value);
                continue;
            }
            echo $value;
        }
    }
}