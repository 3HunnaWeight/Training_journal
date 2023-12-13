<?php

namespace App\Middleware;

use App\Auth\Auth;
use App\View\Redirect;

class PrivateRoute extends RouteAccess
{
    public function handle(): void
    {
        if (Auth::check()) {
            Redirect::to("/");
        }
    }
}
