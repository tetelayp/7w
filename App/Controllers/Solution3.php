<?php
namespace App\Controllers;
use App\Models\Model3;
use App\Models\User;

$solution = new Model3();

$t = $solution::TABLE;
//$sql = 'SELECT * FROM ' . $t . ' WHERE parent NOT IN (SELECT id from ' . $t . ' where id in (SELECT parent FROM ' . $t . ')) ORDER BY id';
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

$solution->convertToTree();
$text = '';
foreach ($solution->tree as $item){

    //$text .= str_repeat('                    ', $item->offset) . '--> (id=' . $item->id . ') (name=' . $item->name . ') (parent=' . $item->parent . ')' . PHP_EOL;
    $text .= str_repeat('            ', $item->offset) . '--> ' . $item->name . PHP_EOL;
}

$view = new \App\View\View();
$view->title = 'Тестовое задание 3';
$view->task = 3;
//$view->data = $data;
$view->dbText = $dbText;
$view->text = $text;
$view->show(__DIR__ . '/../../template/index.php');