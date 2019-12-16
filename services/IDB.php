<?php


namespace app\services;


interface IDB
{
    public function find(string $sql);
    public function findAll (string $sql);
}