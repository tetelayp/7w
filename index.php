<?php
require __DIR__ . '/autoload.php';
if (!isset($_GET['t'])){
    $task = '0';
} else {
    $task = $_GET['t'];
}

$path = __DIR__ . '/App/Controllers/Solution'. $task . '.php';
if (file_exists($path)){
    require $path;
} else {
    $view = new \App\View\View();
    $view->title = 'Тестовые задания';
    $view->task = $task;
    $view->show(__DIR__ . '/template/index.php');
}