<?php

namespace App\Validation\Helpers;

interface InpustCheckInterface
{
    static public function validateEmail(string $email): bool;
    static public function validatePassword(string $pass, string $passConfitm): bool;
    static public function validateName(string $name,): void;
}
