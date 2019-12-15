<?php


namespace app\services\renders;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TmplRender implements IRender
{
    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader([
            dirname(dirname(__DIR__)) . '/views/layouts',
            dirname(dirname(__DIR__)) . '/views'
        ]) ;
        $this->twig = new Environment($loader);
    }



    public function render($template, $params = []){
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', ['content'=>$content]);
    }

    /**
     * @param $template
     * @param array $params
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @param $template
     * @param array $params ["goods" => 123, "tr" => [1,5,6]
     * @return false/starting
     */

    public function renderTmpl($template, $params = []){
        $template .= ".twig";
        return $this->twig->render($template, $params);
    }
}