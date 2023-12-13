<?php

namespace App\Auth;

use App\Models\User;

class  Auth implements AuthInterface
{
    protected static $model;
    protected static $user;
    public static function init(): void
    {
        self::$model = new User();
    }

    public static function check(): bool
    {
        $token = $_COOKIE["token"] ?? null;
        self::$user = self::$model->findInDatabase('token', $token);
        return (bool)self::$user;
    }

    public static function getUser(): mixed
    {
        $token = $_COOKIE["token"] ?? null;
        return self::$user ?? self::$model->findInDatabase("token", $token, false);
    }
}
