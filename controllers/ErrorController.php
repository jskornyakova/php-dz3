<?php


namespace app\controllers;

use app\modules\Error;

class ErrorController extends Controller
{
    public function allAction(){
        $error = new Error();
        return $this->render('error', [
            'error'=>$error,
            'title'=>"Error",
            ]);
    }

}