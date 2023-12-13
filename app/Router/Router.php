<?php

namespace App\Router;

use App\View\Redirect;

class Router implements RouterInterface
{
    public function handle(array $routes): void
    {
        $matched = false;

        foreach ($routes as $route) {

            if ($route['uri'] === $_SERVER['REQUEST_URI']) {
                if (!empty($route['middleware'])) {
                    $middleware = new $route['middleware']();
                    $middleware->handle();
                }
                $controller = new $route['controller']();
                $method = $route['method'];
                $controller->$method();
                $matched = true;
                break;
            }
        }
        if (!$matched) {
            Redirect::to('/');
        }
    }
}
