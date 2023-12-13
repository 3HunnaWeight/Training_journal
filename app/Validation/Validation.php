<?php

namespace App\Validation;


class Validation implements ValidationInerface
{
    private static $errors;
    public static function validate(array $data): void
    {

        $savedInputs = $data;
        unset($savedInputs['password']);
        setcookie('validateInputs', json_encode($savedInputs, JSON_UNESCAPED_UNICODE));
        if (empty($data['password']) || strlen($data['password']) < 5) {
            self::setErrors('password', 'Заполните поле');
        }
    }
    public static function hasError(): bool
    {
        return (bool) self::$errors;
    }
    public static function getErrors(): array|null
    {
        if (isset($_COOKIE['errors'])) {
            $errors = json_decode($_COOKIE['errors'], true);
            setcookie("errors", "", time() - 3600, "/");
            return $errors;
        } else {
            return null;
        }
    }
    public static function getSavedInputs(): array|null
    {
        if (isset($_COOKIE['validateInputs'])) {
            $inputs = json_decode($_COOKIE['validateInputs'], true);
            setcookie("validateInputs", "", time() - 3600, "/");
            return $inputs;
        } else {
            return null;
        }
    }
    public static function setErrors(string $key, mixed $value): void
    {
        self::$errors[$key] = $value;
        setcookie('errors', json_encode(self::$errors, JSON_UNESCAPED_UNICODE));
    }
}
