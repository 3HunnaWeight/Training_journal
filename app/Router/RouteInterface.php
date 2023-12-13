<?php

namespace App\Router;

interface RouteInterface
{
    public static function page(string $uri, string $controller, string $method, array $middleware): void;
    public static function bunchOfRoutes(): array;
}
