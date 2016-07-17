<?php
namespace App\Controllers;
use App\Models\Model2;

$solution = new Model2();
$solution->analyzeFile(__DIR__ . '/../../tasks/task2.txt');


$view = new \App\View\View();
$view->title = 'Тестовые задания';
$view->task = 2;
$view->data = $solution->content;
$view->solution = $solution->values;
$view->show(__DIR__ . '/../../template/index.php');