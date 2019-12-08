<?php

namespace app\modules;

class Good extends Model
{
    public $id;
    public $img;
    public $name;
    public $description;
    public $price;

    //public function filling($params) {}

    /**
     * Возвращает имя таблицы в БД
     * @return string
     */
    public function getTableName(): string
    {
        return 'goods';
    }


}