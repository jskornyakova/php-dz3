<?php


namespace app\controllers;


use app\services\renders\IRender;
use app\services\renders\TmplRender;

abstract class Controller
{
    protected $defaultAction = 'all';
    protected $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function run($action){
        if(empty($action)){
            $action = $this->defaultAction;
        }

        $method = $action . 'Action';
        if (method_exists($this, $method)){
            return $this->$method();
        }

        return header('Location: /');
    }

    protected function render($template, $params = []){
        return $this->render->render($template, $params);
    }
}