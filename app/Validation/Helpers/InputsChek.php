<?php

namespace App\Validation\Helpers;

use App\Validation\Validation;

class InputsChek implements InpustCheckInterface
{
    public static function validateEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    public static function validatePassword(string $pass, string $passConfrim): bool
    {
        return $pass === $passConfrim ? true : false;
    }
    public static function validateName(string $name): void
    {
        empty($name) ?? Validation::setErrors('name', 'Заполните поле');
    }
}
