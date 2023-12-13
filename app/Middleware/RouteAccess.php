<?php

namespace App\Middleware;

abstract class RouteAccess
{
    abstract public function handle(): void;
}
