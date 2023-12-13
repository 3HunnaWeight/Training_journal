<?php

namespace App\Controllers;

use App\View\View;

class ControllerRouter
{
    public function index()
    {
        View::render('index');
    }
    public function register()
    {
        View::render('register');
    }
    public function login()
    {
        View::render('login');
    }
    public function archive()
    {
        View::render('archive');
    }
}
