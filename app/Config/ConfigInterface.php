<?php

namespace App\Config;

interface ConfigInterface
{
    static public function init(): void;
    static public function get(string $key): mixed;
}
