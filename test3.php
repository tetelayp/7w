<?php
CONST TABLE='test3';
$h=new PDO('mysql:host=127.0.0.1; dbname=test','root','');

$sql='SELECT * FROM ' . TABLE . ' WHERE parent NOT IN (SELECT id from ' . TABLE . ' where id in (SELECT parent FROM ' . TABLE . ')) ORDER BY id';

//$sql='SELECT * FROM test3 WHERE id IN (SELECT DISTINCT parent FROM test3) ORDER BY parent,id';
//$sql='SELECT * FROM test3 WHERE id NOT IN (SELECT parent FROM test3) ORDER BY id';

$s=$h->prepare($sql);
$s->execute();


function foo($parent,$sprt, $h) {

    $sql = 'SELECT * FROM test3 WHERE parent=' . $parent . ' ORDER BY id';
    $s = $h->prepare($sql);
    $s->execute();
    $sprt='     ' . $sprt;
        foreach ($s as $v) {
            echo $sprt .$v['id'] . ' - ' . $v['name'] . ' - ' .$v['parent'] . '<br>';
            foo($v['id'], $sprt, $h);
        }
    };

foreach ($s as $v) {
    echo '[' .$v['id'] . ' - ' . $v['name'] . ' - ' .$v['parent'] . ']<br>';
    foo($v['id'],'->', $h);

}


