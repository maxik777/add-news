<?php

use app\core\Router;


spl_autoload_register(function($class)  //Автозагрузчик классов.
{
$path=str_replace('\\','/', $class.'.php');
require $path;
});

session_start();

$router = new Router;

$router->run();