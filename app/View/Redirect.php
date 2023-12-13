<?php

namespace App\View;

class Redirect implements RedirectInterface
{
    static public function to(string $path): void
    {
        header("Location: $path");
    }
}
