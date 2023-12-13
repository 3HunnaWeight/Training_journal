<?php

namespace App\Auth;

interface AuthInterface
{
    static public function init(): void;
    static public function check(): bool;
    static public function getUser(): mixed;
}
