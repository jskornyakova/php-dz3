<?php


namespace app\modules;


class Error extends Model
{

    /**
     * Возвращает имя таблицы в БД
     * @return string
     */
    public function getTableName(): string
    {
        return 'error';
    }

}