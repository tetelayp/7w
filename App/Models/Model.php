<?php

namespace App\Models;


class Model
{
    public $content;
    public function getTextFromFile(string $fullName)
    {
        if (file_exists($fullName)){
            $handle = fopen($fullName, "r");
            if (false != $handle){
                $contents = fread($handle, filesize($fullName));
                fclose($handle);
                //$this->content = $contents;
                return $contents;
            }
        }
        return null;
    }

    public function analyzeFile(string $fullFilename)
    {
        $text = $this->getTextFromFile($fullFilename);
        if (!empty($text)){
            $this->content = $text;
            $this->analyzeText($text);
            return true;
        }
        return false;
    }

    public function analyzeText(string $text)
    {
    }
}