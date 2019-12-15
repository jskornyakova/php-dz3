<?php


namespace app\controllers;

use app\modules\Good;

class GoodController extends Controller
{
    public function allAction(){
        $goods = (new Good())->getAll();
        return $this->render('goods', ['goods'=>$goods]);
    }

    public function oneAction(){
        $good = (new Good())->getOne($_GET['id']);
        return $this->render('good',['good'=>$good] );
    }

}