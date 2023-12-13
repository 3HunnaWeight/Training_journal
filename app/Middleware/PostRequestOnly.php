<?php

namespace App\Middleware;

use App\View\Redirect;

class PostRequestOnly extends RouteAccess
{
    public function handle(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Redirect::to('/');
            exit();
        }
    }
}
