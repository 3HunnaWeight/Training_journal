<?php

namespace App\Controllers;

use App\Controllers\Helpers\CreateUser;
use App\Controllers\Helpers\FindUser;
use App\Controllers\Helpers\Logout;


class   UserController
{
    public function register()
    {
        CreateUser::createUser($_POST);
    }
    public function login()
    {
        FindUser::findUser($_POST);
    }
    public function logout()
    {
        Logout::logout();
    }
}
