<?php

namespace App\View;


class View
{

    protected $data=[];
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __isset($name)
    {
        return !empty($this->data[$name]);
    }
    public function __get($name)
    {
        return $this->data[$name];
    }
    public function render($template)
    {
        foreach ($this->data as $k=>$v){
            $$k = $v;
        }
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function show($template)
    {
        echo $this->render($template);
    }
}