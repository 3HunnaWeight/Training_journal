<?php

namespace App\View;

class View implements ViewInterface
{
    static public function render(string $path): void
    {
        require_once __DIR__ . "/../../views/pages/$path.php";
    }
    static public function renderComponents(string $path): void
    {
        require_once __DIR__ . "/../../views/components/$path.php";
    }
}
