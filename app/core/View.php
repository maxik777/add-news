<?php

namespace app\core;


class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->path = $route['controller'].'/'.$route['action']; //Route to views from View.

    }

    public function render($vars =[])
    {
        extract($vars);
        ob_start();
        require 'app/views/'.$this->path.'.php';
        $content = ob_get_clean();
        require 'app/views/layouts/'.$this->layout.'.php';
    }
}