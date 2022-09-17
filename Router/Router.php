<?php

use phpDocumentor\Reflection\Location;

class Router
{
    public $routes = [];

    function get($route, $target)
    {
        $this->routes['get'][$route] = $target;
    }

    function post($route, $target)
    {
        $this->routes['post'][$route] = $target;
    }

    function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    function getRoute()
    {
        $path = $_SERVER['REQUEST_URI'];
        $QtPosition = strpos($path, '?');
        if ($QtPosition === false) {
            return $path;
        } else {
            return substr($path, 0, $QtPosition);
        }
    }

    function pageRender()
    {
        $path = $this->getRoute();
        $method = $this->method();
        if (isset($this->routes[$method][$path])) {
            $findPage = $this->routes[$method][$path];
            ob_start();
            include_once($findPage);
        } else {
            http_response_code(404);
            ob_start();
            include_once("./components/_404.php");
        }
        return ob_get_clean();
    }

    function run()
    {
        echo $this->pageRender();
    }
}
