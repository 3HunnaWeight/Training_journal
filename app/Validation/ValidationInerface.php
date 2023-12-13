<?php

namespace App\Validation;

interface ValidationInerface
{
    static public function validate(array $data): void;
    static public function hasError(): bool;
    static public function getErrors(): array|null;
    static public function getSavedInputs(): array|null;
    static public function setErrors(string $key, mixed $value): void;
}
