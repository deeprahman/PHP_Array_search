<?php
/*

LeetCode Proble-solution

You are a product manager and currently leading a team to develop a new product. Unfortunately, the latest version of your product fails the quality check. Since each version is developed based on the previous version, all the versions after a bad version are also bad.

Suppose you have n versions [1, 2, ..., n] and you want to find out the first bad one, which causes all the following ones to be bad.

You are given an API bool isBadVersion(version) which returns whether version is bad. Implement a function to find the first bad version. You should minimize the number of calls to the API.
*/



class VersionControl{
    public $bad = 2;
    public function __construct($n, $bad){
        $this->bad = $bad;
//        $this->bad = rand(1,$n);
    }
    public function isBadVersion($m)
    {
        if($this->bad <= $m){
            return true;
        }
        return false;
    }
}

class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $b = 1;
        do{
            $m = (int) floor(($b+$n)/2);
            $ib = $this->isBadVersion($m);
            if(false === $ib){
                $b = $m+1; // remove left portion including $m
            }else if(true === $ib){
                $n = $m; // Remove right protion exculidng $m
            }
           
        }while($b < $n);
        if($this->isBadVersion($n)){
            return $n;
        }
       return -1;
    
    }
}

$n = 100;
$bad = 6;

$v = new Solution($n,$bad);
printf("Bad version begins at %d\n", $v->bad);

$res = $v->firstBadVersion($n);

if(!empty($res)){
    printf("Bad version: %d\n", $res);
}else{
    printf("Not found\n");
}
