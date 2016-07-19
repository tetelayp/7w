<?php
namespace App\Controllers;

$arr = range(1, 1000000);
shuffle($arr);

$begin = microtime(TRUE);
$tmp=array_count_values($arr);

$res = array_keys($tmp);

$end = microtime(TRUE);
$time1 = $end - $begin;

//************************
$tmp=[];
$begin = microtime(TRUE);
foreach ($arr as $v){
    $tmp[$v]=1;
}
$res = array_keys($tmp);
$end = microtime(TRUE);
$time2 = $end - $begin;


$text = 'Использование функции array_count_values: ' . $time1;
$text .= PHP_EOL . 'Использование перебора в цикле: ' . $time2;

$view = new \App\View\View();
$view->title = 'Тестовое задание 6';
$view->task = '6';
//$view->data = $solution->content;
$view->text = $text;
$view->show(__DIR__ . '/../../template/index.php');