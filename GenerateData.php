<?php


class GenerateData
{
    const ITEM_NUM = 10000;
    CONST INIT_VAL = 1;

    static function genData(): \SplFixedArray
    {
        $container = new SplFixedArray(GenerateData::ITEM_NUM);
        $init_val = GenerateData::INIT_VAL;
        $index = 0;
        for($index; (GenerateData::ITEM_NUM >= 0) && ($index < GenerateData::ITEM_NUM); $index++){
            $container[$index] = $init_val;
            $init_val++;
        }
        return $container;
    }

    static function printData()
    {
        print_r(GenerateData::genData());
    }
}

// GenerateData::printData();