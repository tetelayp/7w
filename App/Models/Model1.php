<?php

namespace App\Models;


class Model1 extends Model
{

    public $descriptions=[];
    public $values=[];
    public function __construct(string $text = '')
    {
        $this->analyzeText($text);
    }

    public function analyzeText (string $text){

        $this->content = $text;

        if (!empty($text)) {
            preg_match_all('/\[([\A-ZА-ЯЁ_]+)\:(.*)\](.*|\n)\[\/\g{1}\]/u', $text, $res);
            foreach ($res[1] as $key => $val) {
                    $this->descriptions[$val] = $res[2][$key];
                    $this->values[$val] = $res[3][$key];
            }
        }
    }


}