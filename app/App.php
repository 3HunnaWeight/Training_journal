<?php

namespace App;

use App\Auth\Auth;
use App\Router\Route;
use App\Router\Router;

require __DIR__ . "/../routes/routes/page.php";
require __DIR__ . "/../routes/actions/actions.php";
class  App
{
    public function run()
    {
        $router = new Router();
        Auth::init();
        $router->handle(Route::BunchOfRoutes());
    }
}
