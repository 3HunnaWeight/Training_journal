<?php

namespace App\Router;

class Route implements RouteInterface
{
    static array $routes = [];
    public static function page(string $uri, string $controller, string $method, $middleware = []): void
    {
        self::$routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middleware" => $middleware
        ];
    }

    public static function bunchOfRoutes(): array
    {
        return self::$routes;
    }
}
