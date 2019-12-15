<?php
use app\services\Autoload;
use app\services\renders\TmplRender;

//include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoload.php";
//spl_autoload_register([new Autoload(), 'loadClass']);

require_once $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";


$controllerName = $_GET['c'] ?: 'user';
$actionName = '';
if (!empty($_GET['a'])){
    $actionName = $_GET['a'];
}

$controllerClass = 'app\\controllers\\' . ucfirst($controllerName) . 'Controller';
if(class_exists($controllerClass)) {
    $controller = new $controllerClass(new TmplRender());
    echo $controller->run($actionName);
}