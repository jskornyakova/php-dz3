<?php
use app\services\Autoload;
use app\services\renders\TwigRender;

//include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoload.php";
//spl_autoload_register([new Autoload(), 'loadClass']);

require_once $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";

$request = new \app\services\Request();


$controllerName = $request->getControllerName() ?: 'user';
$actionName = $request->getActionName();

$controllerClass = 'app\\controllers\\' . ucfirst($controllerName) . 'Controller';
if(class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender(), $request);
    echo $controller->run($actionName);
}