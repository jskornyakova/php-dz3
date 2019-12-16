<?php


namespace app\modules;


class Order extends Model
{
    public $id;
   // public $data_order;
    public $user_id;
    public $order_details;
    public $total_cost;

    /**
     * Возвращает имя таблицы в БД
     * @return string
     */
    public function getTableName(): string
    {
        return 'orders';
    }



}