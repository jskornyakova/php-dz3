<?php


namespace app\controllers;


use app\modules\IPostRepository;
use app\services\renders\IRender;
use app\services\Request;

class PostController extends Controller
{
    private $repo;
    public function __construct(IRender $render, Request $request, IPostRepository $repo)
    {
        parent::__construct($render, $request);
        $this->repo = $repo;
    }
    public function getDate(){
        return $this->repo->getDate();
    }
    public function insert(){
        return $this->repo->insert();
    }
    public function delete($id){
        return $this->repo->delete($id);
    }
    public function update($id){
        return $this->repo->update($id);
    }
    public function save(){
        return $this->repo->save();
    }
}