<?php

namespace app\modules;

class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;

    /**
     * Возвращает имя таблицы в БД
     * @return string
     */
    public function getTableName(): string
    {
        return 'users';
    }
    public function getAuthUser(){
        return <<<php
        <h1>{$this->id}=>{$this->name}</h1>
php;

    }
}