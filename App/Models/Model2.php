<?php

namespace App\Models;


class Model2 extends Model
{
    public $values;
    public function analyzeText(string $text)
    {
        $this->content = $text;
        
        preg_match_all('/(raz:|dva:|tri:)(.*|\n*)/u', $text,$res);
        $data=[];
        foreach ($res[1] as $key=>$val)
        {
            $data[$val]=$res[2][$key];
        }
        $this->values = $data;
    }
}