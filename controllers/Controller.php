<?php


namespace app\controllers;


use app\services\renders\IRender;
use app\services\Request;

abstract class Controller
{
    protected $defaultAction = 'all';
    protected $render;
    protected $request;

    public function __construct(IRender $render, Request $request)
    {
        $this->render = $render;
        $this->request = $request;
    }

    public function run($action){
        if(empty($action)){
            $action = $this->defaultAction;
        }

        $method = $action . 'Action';
        if (method_exists($this, $method)){
            return $this->$method();
        } else {
            return header('Location: /error');
        }
    }

    protected function render($template, $params = []){
        return $this->render->render($template, $params);
    }
    protected function getId(){
        return (int) $this->request->get('id');
    }
}