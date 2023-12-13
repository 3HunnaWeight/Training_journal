<?php

namespace App\View;

interface RedirectInterface
{
    static public function to(string $path): void;
}
