<?php
$text='raz:В лесу родилась ёлочка,
   raz:в лесу она росла.
   dva:Зимой и летом стройная,
   tri:зелёная была!';
$a=preg_match_all('/(raz:|dva:|tri:)(.*|\n*)/u', $text,$res);
//var_dump($res);
$data=[];
foreach ($res[1] as $key=>$val)
{
    $data[$val]=$res[2][$key];
}
var_dump($data);