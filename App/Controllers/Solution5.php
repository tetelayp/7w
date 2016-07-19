<?php
namespace App\Controllers;
use App\Models\Model3;
use App\Models\User;

$solution = new Model3();

$t = $solution::TABLE;
$sql = 'SELECT * FROM ' . $t;
$solution->query($sql, User::class);
if (0 == count($solution->queryResult)){
    $solution->fillTable();
    $solution->query($sql, User::class);
}

$dbText = 'id - name - parent';
foreach ($solution->queryResult as $item){
    $dbText .= PHP_EOL . $item->id . ' - ' . $item->name . ' - ' . $item->parent;
}


$sql = 'SELECT t1.id, t1.name, t1.parent FROM ' . $t . ' t1, ' . $t . ' t2, ' . $t . ' t3 WHERE (t1.id NOT IN (SELECT parent FROM ' . $t . ')) AND t1.parent=t2.id AND t2.parent=t3.id';
$solution->query($sql, User::class);
$text = '';
foreach ($solution->queryResult as $item){
    $text .= PHP_EOL . $item->id . ' - ' . $item->name . ' - ' . $item->parent;
}

$view = new \App\View\View();
$view->title = 'Тестовое задание 5';
$view->task = 5;
$view->dbText = $dbText;
$view->text = $text;
$view->show(__DIR__ . '/../../template/index.php');