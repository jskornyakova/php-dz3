<?php


namespace app\modules;


class Order extends Model
{

    /**
     * Возвращает имя таблицы в БД
     * @return string
     */
    public function getTableName(): string
    {
        return 'orders';
    }

    public function getTotalCost(){
        $sql='';
        return $this->db->findAll($sql);
    }

}