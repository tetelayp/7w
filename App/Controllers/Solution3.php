<?php
namespace App\Controllers;
use App\Models\Model3;

$solution = new Model3();
$solution->createDataBase();
$solution->createTable();


$view = new \App\View\View();
$view->title = 'Тестовое задание 3';
$view->task = 3;
//$view->data = $solution->content;
//$view->solution = $solution->values;
$view->show(__DIR__ . '/../../template/index.php');