<?php


require_once "./GenerateData.php";
require_once "./BinarySearch.php";
require_once "./LinearSearch.php";

final class Search
{
    public $data;

    public function setData()
    {
        $this->data = GenerateData::genData();
    }

    public function bSearch($target)
    {
        $this->setData();
        $start_time = microtime(true);
        $res = BinarySearch::search($this->data, $target, ['BinarySearch','intCompare']);
        $end_time = microtime(true);
        $elapsed_time = $end_time - $start_time;
        printf("BinarySsearch: Elapsed time: %f sec\n",$elapsed_time);
        if( $res === -1){
            printf("BinarySearch: Target not found\n");
        }else{
            printf("BinarySearch:Target %d Found\n", $this->data[$res]);
        }
    }

    public function lSearch($target)
    {
        $this->setData();
        $start_time = microtime(true);
        $res = LinearSearch::search($this->data, $target);
        $end_time = microtime(true);
        $elapsed_time = $end_time - $start_time;
        printf("LinearSsearch: Elapsed time: %f sec\n",$elapsed_time);
        if( $res === -1){
            printf("LinearSearch: Target not found\n");
        }else{
            printf("LinearSearch:Target %d Found\n", $this->data[$res]);
        }
    }
}

$s = new Search();
$target = 10000;
$s->bSearch($target);
$s->lSearch($target);

