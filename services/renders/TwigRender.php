<?php


namespace app\services\renders;


class TwigRender implements IRender
{

    public function render($template, $params = []){
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', ['content'=>$content]);
    }

    /**
     * @param $template
     * @param array $params ["goods" => 123, "tr" => [1,5,6]
     * @return false/starting
     */
    public function renderTmpl($template, $params = []){
        ob_start();
        extract($params);
        include dirname(dirname(__DIR__)) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}