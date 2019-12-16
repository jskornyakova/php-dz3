<?php


namespace app\services\renders;


interface IRender
{
    public function render($template, $params = []);
    public function renderTmpl($template, $params = []);
}