<?php

namespace App;

use AltoRouter;

class Router
{

    /**
     * path
     *
     * @var string
     */
    private $viewpath;

    /**
     * router
     *
     * @var AltoRouter
     */
    private $router;

    public function  __construct(string $path)
    {
        $this->viewpath = $path;
        $this->router =  new AltoRouter();
    }

    public function get(string $url, string $template, ?string  $name = null)
    {

        $this->router->map('GET', $url, $template, $name);
        return $this;
    }
    public function run()
    {
        $match = $this->router->match();

        $view = $match['target'];
        ob_start();

        require $this->viewpath . '/' . $view . '.php';

        $content = ob_get_clean();
        require  '../templates/layouts/default.php';
    }
}
