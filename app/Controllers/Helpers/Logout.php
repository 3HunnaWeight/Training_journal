<?php

namespace App\Controllers\Helpers;

use App\View\Redirect;

class Logout
{
    public static function logout()
    {
        setcookie("token", "", time() - 3600, "/");
        Redirect::to("/login");
    }
}
