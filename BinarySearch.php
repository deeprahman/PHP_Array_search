<?php

class BinarySearch
{
    static function search($data, $target, callable $comp_function)
    {
        $size = sizeof($data);
        if(0 == $size) return -1;
        $bign_indx=0;
        $end_indx=$size-1;
        while($bign_indx <= $end_indx){
            $mid_indx = floor(($bign_indx + $end_indx)/2);
            $res = $comp_function($target, $data[$mid_indx]);
            if($res > 0){ // Target grater than the mid-value
                $bign_indx = $mid_indx + 1;
            }else if($res < 0){ // targe less than the mid-value
                $end_indx = $mid_indx - 1;
            }else{
                return $mid_indx;
            }
        }
        return -1;
    }

    static function intCompare($x, $y)
    {
        if($x > $y){
            return 1;
        }else if($x < $y){
            return -1;
        }else{
            return 0;
        }
    }

}


