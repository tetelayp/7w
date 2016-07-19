<?php
namespace App\Controllers;

if (isset($_POST['answer'])) {
    $b='a';
    $a = [];
    $len = rand(1,7);
    for($i=0; $i<$len; $i++){
        $a[]=$b;
        $b++;
    }

    $arr = [];
    foreach ($a as $v){
        $len = rand(1,7);
        $line = [];
        for ($i=0; $i<$len; $i++){
            $line[] = $v . $i;
        }
        $arr[] = $line;
    }


} else {
    $arr = [
        ['а1', 'а2', 'а3'],
        ['b1', 'b2'],
        ['c1', 'c2', 'c3'],
        ['d1']
    ];
}

$counter = array_fill(0,count($arr),0);

function counter_increment(array &$counter, array $pattern)
{
    $counter[count($counter)-1]++;
    for ($i=(count($counter)-1); $i>0; $i--){
        if ($counter[$i]==count($pattern[$i])){
            $counter[$i]=0;
            $counter[$i-1]++;
        }
    }
    if ($counter[0]==count($pattern[0])){
        return false;
    }

    return true;

}

$result=[];
do {

    $tmp = [];
    foreach ($counter as $k => $v) {
        $tmp[] = $arr[$k][$v];
    }
    $result[] = $tmp;

} while (counter_increment($counter, $arr));

$dbText = '';
foreach ($arr as $v){
    $dbText .= implode(', ', $v) . PHP_EOL;
}

$text = '';
foreach ($result as $v){
    $text .= implode(' ', $v) . PHP_EOL;
}

$view = new \App\View\View();
$view->title = 'Тестовое задание 7';
$view->task = '7';
$view->showButton = 1;
$view->dbText = $dbText;
$view->text = $text;
$view->show(__DIR__ . '/../../template/index.php');