<?php

namespace App\Config;

class Config implements ConfigInterface
{
    static private $config;
    public static function init(): void
    {
        self::$config = require_once __DIR__ . "/db.php";
    }
    public static function get(string $key): mixed
    {
        if (self::$config === null) {
            self::init();
        }
        return self::$config[$key];
    }
}
