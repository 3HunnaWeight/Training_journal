<?php

namespace App\View;

interface ViewInterface
{
    static public function render(string $path): void;
    static public function renderComponents(string $path): void;
}
