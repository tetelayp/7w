<?php
namespace App\Controllers;
use App\Models\Model2;

$solution = new Model2();
$solution->analyzeFile(__DIR__ . '/../../tasks/task2.txt');


$view = new \App\View\View();
$view->title = 'Тестовое задание 3';
$view->task = 3;
$view->data = $solution->content;
$view->solution = $solution->values;
$view->show(__DIR__ . '/../../template/index.php');