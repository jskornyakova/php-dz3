<?php


namespace app\controllers;


use app\modules\User;

class UserController
{
    protected $defaultAction = 'all';
    public function run($action){
       if(empty($action)){
           $action = $this->defaultAction;
       }

       $method = $action . 'Action';
       if (method_exists($this, $method)){
           return $this->$method();
       }

       return '404';
    }

    public function allAction(){
        $users = (new User())->getAll();
        return $this->render('users', ['users'=>$users]);
    }

    public function oneAction(){
        $user = (new User())->getOne($_GET['id']);
        return $this->render('user',['user'=>$user] );
    }
    public function render($template, $params = []){
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', ['content'=>$content]);
    }

    /**
     * @param $template
     * @param array $params ["users" => 123, "tr" => [1,5,6]
     * @return false/starting
     */
    public function renderTmpl($template, $params = []){
        ob_start();
        extract($params);
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}