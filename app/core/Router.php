<?php
namespace Core;

class Router {
    public function direct($url) {
        $url = explode('/', trim($url, '/'));

        $controllerName = ucfirst($url[0] ?? 'Home') . 'Controller';
        $method = $url[1] ?? 'index';

        $controllerPath = "../app/controllers/{$controllerName}.php";

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $controllerName();

            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], array_slice($url, 2));
            } else {
                echo "Method not found.";
            }
        } else {
            echo "Controller not found.";
        }
    }
}
