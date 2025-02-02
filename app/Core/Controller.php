<?php

declare(strict_types=1);

namespace App\Core;

abstract class Controller {
    protected function view(string $name, array $data = []): void {
        extract($data);

        ob_start();
        require_once __DIR__ . "/../Views/{$name}.php";
        $content = ob_get_clean();

        require_once __DIR__ . "/../Views/layouts/main.php";
    }

    protected function redirect(string $url): void {
        header("Location: {$url}");
        exit;
    }
}