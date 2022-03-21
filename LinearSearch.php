<?php

class LinearSearch
{
    public static function search(\SplFixedArray $data, int $target):int
    {
        $index = 0;
        for($index; $index < $data->getSize(); $index++){
            if($target === $data[$index]){
                return $index;
            }
        }
        return -1;
    }
}