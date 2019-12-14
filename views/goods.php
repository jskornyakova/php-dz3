<?php
/**
 * @var \app\modules\Good [] $goods ...
 */
$list = "<div class='products'>";
foreach ($goods as $good) {

    $list .= "<div class='product'>";
    $list .= "<img src='../img/{$good->img}'>";
    $list .= "<h2>{$good->name}</h2>";
    $list .= "<a href='/?c=good&a=one&id={$good->id}'><button>Description</button></a>";
    $list .= "</div>";
}
$list .= "</div>";
echo $list;