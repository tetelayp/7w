<?php
CONST TABLE='test3';
$h=new PDO('mysql:host=127.0.0.1; dbname=test','root','');

$sql='SELECT * FROM ' . TABLE . ' WHERE parent NOT IN (SELECT id from ' . TABLE . ' where id in (SELECT parent FROM ' . TABLE . ')) ORDER BY id';

function foo($sql, $h ,$sprt='') {


    $s = $h->prepare($sql);
    $s->execute();
    $res='';
    if ($sprt) {
        $sprt = '_____' . $sprt;
    }
        foreach ($s as $v) {
            $res .= $sprt .$v['id'] . ' - ' . $v['name'] . ' - ' .$v['parent'] . '<br>';
            $sql = 'SELECT * FROM ' . TABLE . ' WHERE parent=' . $v['id'] . ' ORDER BY id';
            //echo $sql;
            if (!$sprt) {
                $sprt = '->';
            }
            $res .= foo($sql, $h, $sprt);
        }

    return $res;
    }

echo foo($sql,$h);



