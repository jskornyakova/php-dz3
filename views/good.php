<?php
/**
 * @var \app\modules\Good [] $goods ...
 */
$list = "<div class='products'>";
$list .= "<div class='product'>";
$list .= "<img src='../img/{$good->img}'>";
$list .= "<h2>{$good->name}</h2>";
$list .= "<p>{$good->description}</p>";
$list .= "<h2>{$good->price} $</h2>";
$list .= "<a href='/?c=good&a=one&id={$good->id}'><button>Buy</button></a>";
$list .= "</div>";
$list .= "</div>";
$list .= "<a href='/?c=good'>To go back</a>";
echo $list;