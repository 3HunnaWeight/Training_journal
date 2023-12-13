<?php

namespace App\Router;

interface RouterInterface
{
    public function handle(array $routes): void;
}
