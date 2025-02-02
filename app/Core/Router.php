<?php

declare(strict_types=1);

namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $path, array $controller): void {
        $this->routes['GET'][$path] = $controller;
    }

    public function post(string $path, array $controller): void {
        $this->routes['POST'][$path] = $controller;
    }

    public function dispatch(string $uri, string $method): void {
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            [$controller, $action] = $this->routes[$method][$path];
            $controller = new $controller();
            $controller->$action();
            return;
        }

        throw new \RuntimeException("Route not found", 404);
    }
}