<?php

namespace Nath\TpPaginaire\Kernel;

use Nath\TpPaginaire\Config\Config;

class Dispatcher
{
    private $controller;
    private $action;
    private $params;

    public function __construct()
    {

        $this->controller = Config::CONTROLLER . 'IndexController';
        $this->action = 'handle';
        $this->params = [];

        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $pathParts = explode('/', trim($path, '/'));

        if (isset($pathParts[0])) {
           
            $controllerName = ucfirst($pathParts[0]) . 'Controller';
            if (class_exists(Config::CONTROLLER . $controllerName)) {
                $this->controller = Config::CONTROLLER . $controllerName;
            }
        }

        if (isset($pathParts[1])) {
            $controllerObject = new $this->controller;
            if (is_callable($controllerObject, $pathParts[1])) {
                $this->action = $pathParts[1];
            } else {
                $this->params[] = $pathParts[1];
            }
        }

        if (count($pathParts) > 2) {
            $this->params = array_merge($this->params, array_slice($pathParts, 2));
        }
    }

    public function Dispatch()
    {
        if ($this->isStaticFileRequest()) {
            $staticFileController = new \Nath\TpPaginaire\Kernel\StaticFileController();
            $staticFileController->handle($this->params);
        } else {
            $controllerObject = new $this->controller;
            $controllerObject->{$this->action}($this->params);
        }
    }

    private function isStaticFileRequest()
    {
        // Check if the request is for a CSS, JS, image, or any other static file type
        $supportedStaticFileTypes = ['css', 'js', 'jpg', 'jpeg', 'png', 'svg', 'woff', 'woff2', 'ttf', 'otf', 'eot'];
        return in_array(pathinfo($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION), $supportedStaticFileTypes);
    }
}
