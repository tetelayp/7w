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


$sql = 'SELECT DISTINCT t1.id, t1.name, t1.parent FROM ' . $t . '  t1, ' . $t . ' t2, ' . $t . ' t3, ' . $t . ' t4 
        WHERE t1.id=t2.parent AND t2.id=t3.parent AND t3.id=t4.parent AND t1.parent NOT IN (SELECT id from ' . $t . ' WHERE id IN (SELECT parent FROM ' . $t . '))';
$solution->query($sql, User::class);
$text = '';
foreach ($solution->queryResult as $item){
    $text .= PHP_EOL . $item->id . ' - ' . $item->name . ' - ' . $item->parent;
}

$view = new \App\View\View();
$view->title = 'Тестовое задание 4';
$view->task = 4;
$view->dbText = $dbText;
$view->text = $text;
$view->show(__DIR__ . '/../../template/index.php');