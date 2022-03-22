<?php
/*
Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it would be if it were inserted in order.

You must write an algorithm with O(log n) runtime complexity.
*/

class FindPosition
{
    public $data;
    public function __construct($end = 10, $type = "odd")
    {
        $this->generateData($type,$end);
        $this->data = [1,3,5,6];
    }
    public function generateData($type= 'odd', $end = 10)
    {
        $arr = new SplFixedArray($end);
        switch($type){
            case 'odd':
                $fn = function($i){
                    return (2*$i)+1;
                };
                break;
            case 'even':
                $fn = function($i){
                    return (2*$i);
                };   
                break; 
        }
        for($i=0; $i < $end; $i++){
            $arr[$i] = $fn($i);
        }
        $this->data = $arr;
    }

    public function printData($data)
    {
        foreach($data as $key => $val){
            printf("Key: %d   Value: %d\n",$key, $val);
        }
    }

    function searchInsert($nums, $target) {
        $b = 0;
        $e = count($nums) - 1;
        while($b <= $e){
            $m = (int)floor(($b+$e)/2);
            if($nums[$m] === $target){
                return $m;
            }else if($target > $nums[$m]){
                $b = $m+1;
            }else if($target < $nums[$m]){
                $e = $m-1;
            }
            
        }
        if($target > $nums[$m]){
            return $m + 1;
        }else{
            return $m;
        }
    }
}

$c = new FindPosition(10, "odd");
$c->printData($c->data);

$nums = $c->data;
$target = 5;
$expected = 2;
$actual = $c->searchInsert($nums, $target);

if($expected === $actual){
    printf("Expected: $expected is equal to the actual: $actual\n");
}else{
    printf("Expected: $expected is NOT equal to the actual: $actual\n");
}