<?php

namespace app\services;
use app\traits\TSingleton;

class DB implements IDB
{

    use TSingleton;

    protected $connect;

    protected function getConnection(){
        if (empty($this->connect)){
            $this->connect = new \PDO(
                $this->getPrepareDsnString(),
                $this->config['login'],
                $this->config['password']);
            $this->connect->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connect;
    }

    protected function getPrepareDsnString(){
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['db'],
            $this->config['charset']
            );
    }

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'db' => 'shop',
        'charset' => 'UTF8',
        'login' => 'root',
        'password' => ''
    ];

    protected function query($sql, $params = []){
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }

    public function queryObject($sql, $class, $params = []){
        $PDOStatement = $this->query($sql, $params);
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetch();
    }
    public function queryObjects($sql, $class, $params = []){
        $PDOStatement = $this->query($sql, $params);
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetchAll();
    }

    public function find(string $sql, $params = []){
        return $this->query($sql, $params)->fetch();
    }

    public function findAll (string $sql, $params = []){
        return $this->query($sql, $params)->fetchAll();
    }

    public function exec($sql, $params = []){
        $this->query($sql, $params);
    }



}