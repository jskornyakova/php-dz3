<?php
use app\services\Autoload;
use app\modules\Good;
use app\modules\User;
use app\modules\Order;

include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$good = new Good();
$good->id = 7;
$good->img = '06.jpeg';
$good->name = 'Testo';
$good->description = 'info';
$good->price = 50;
$good->save();

$user = new User();
var_dump($user->getAll());

$order = new Order();
var_dump($order->getAll());