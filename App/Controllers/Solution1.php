<?php
namespace App\Controllers;
use App\Models\Model1;

$solution = new Model1();
$solution->analyzeFile(__DIR__ . '/../../tasks/task1.txt');

$accum=[];
$accum['values'] = $solution->values;
$accum['descriptions'] = $solution->descriptions;


$view = new \App\View\View();
$view->title = 'Тестовое задание 1';
$view->task = '1';
$view->data = $solution->content;
$view->solution = $accum;
$view->show(__DIR__ . '/../../template/index.php');