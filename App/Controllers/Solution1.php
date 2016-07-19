<?php
namespace App\Controllers;
use App\Models\Model1;

$solution = new Model1();


if (!isset($_POST['data'])) {
    $solution->analyzeFile(__DIR__ . '/../../tasks/task1.txt');
} else {
    $solution->analyzeText($_POST['data']);
}

//$accum=[];
//$accum['values'] = $solution->values;
//$accum['descriptions'] = $solution->descriptions;

$text = 'Values:';
foreach ($solution->values as $k=>$v){
    $text .= PHP_EOL . '[' . $k . '] => \'' .$v . '\'';
}

$text .= PHP_EOL . PHP_EOL .'Descriptions:';
foreach ($solution->descriptions as $k=>$v){
    $text .= PHP_EOL . '[' . $k . '] => \'' .$v . '\'';
}


$view = new \App\View\View();
$view->title = 'Тестовое задание 1';
$view->task = '1';
$view->data = $solution->content;
//$view->solution = $accum;
$view->text = $text;
$view->show(__DIR__ . '/../../template/index.php');