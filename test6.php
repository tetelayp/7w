<?php
//$arr=['a','b',11,23,1,1,1,2,2,2,3,3,5,6,7,5,6,7,8,8,8,9,0,9,0,9,0];

$arr = range(1, 1000000);
shuffle($arr);

$begin = microtime(TRUE);
$tmp=array_count_values($arr);
//var_dump($tmp);
$res = array_keys($tmp);
//var_dump($res);

$end = microtime(TRUE);
echo sprintf("\nExecution time: %.3f", $end - $begin);
//************************
$tmp=[];
$begin = microtime(TRUE);
foreach ($arr as $v){
        $tmp[$v]=1;

}
$end = microtime(TRUE);
echo sprintf("\nExecution time: %.3f", $end - $begin);