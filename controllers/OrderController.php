<?php


namespace app\controllers;

use app\modules\Good;
use app\modules\Order;

class OrderController extends Controller
{

    public function allAction()
    {
        $goods = (new Good())->getAll();
        return $this->render('goods', [
            'goods' => $goods,
            'title' => "Catalog",
        ]);
    }

    public function oneAction()
    {
        $good = (new Good())->getOne($this->getId());
        return $this->render('good', ['good' => $good]);
    }

    public function addAction()
    { //нужна правильная взаимосвязь в таблицах, в новый order должны прилетать данные id пользователя и data_order пока сделала условно.
        //1. заполняется таблица order
        //   Создает №заказа, пользователь, сессия, детали, общая стоимость
        //2. заполняется таблица cart_details
        //   Добавляются данные товара, количество, считается стоимость по каждому товару, id_order, id_product
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $order = new Order();
            $order->user_id = 2;
            $order->total_cost = 5;
            $good = (new Good())->getOne($this->getId());
            foreach ($good as $item => $key){
                if($item !== 'bd'){
                    $order->order_details = [$item => $key];
                }
            }
            $order->insert();
              var_dump($order);
        }
        return $this->render('order', ['order' => $order]);
    }

    public function getTotalCost()
    {
        $sql = '';
        return $this->db->findAll($sql);
    }

}