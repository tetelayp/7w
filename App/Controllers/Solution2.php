<?php
namespace App\Controllers;
use App\Models\Model2;

$solution = new Model2();
$solution->analyzeFile(__DIR__ . '/../../tasks/task2.txt');

$text = 'Values:';
foreach ($solution->values as $k=>$v){
    $text .= PHP_EOL . '[' . $k . '] => \'' . $v . '\'';
}


$view = new \App\View\View();
$view->title = 'Тестовое задание 2';
$view->task = 2;
$view->data = $solution->content;
//$view->solution = $solution->values;
$view->text = $text;
$view->show(__DIR__ . '/../../template/index.php');