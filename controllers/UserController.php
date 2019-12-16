<?php


namespace app\controllers;


use app\modules\User;

class UserController extends Controller
{
    public function allAction(){
        $users = (new User())->getAll();
        return $this->render('users', [
            'users'=>$users,
            'title'=>"All Users",
            ]);
    }

    public function oneAction(){
        $user = (new User())->getOne($this->getId());
        return $this->render('user',['user'=>$user] );
    }

    public function addAction(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User();
            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->save();
            return header('Location: /user');
        }
        return $this->render('userAdd');
    }

    public function updateAction(){
        $id = $this->getId();
        if (empty($id)){
            return header('Location: /error');
        }
        $user = (new User())->getOne($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->save();
            return header('Location: /user');
        }
        return $this->render('userUpdate', ['user'=>$user]);
    }
}