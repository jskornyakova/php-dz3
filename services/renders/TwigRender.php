<?php


namespace app\services\renders;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRender implements IRender
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
        $template .= ".twig";
        return $this->twig->render($template, $params);
    }


    public function renderTmpl($template, $params = []){

    }
}