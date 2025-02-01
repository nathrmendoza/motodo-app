<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$router = new App\Core\Router();

//define routes
$router->get('/', [App\Controllers\HomeController::class, 'index']);
$router->get('/login', [App\Controllers\AuthController::class, 'loginForm']);
$router->post('/login', [App\Controllers\AuthController::class, 'login']);
$router->get('/register', [App\Controllers\AuthController::class, 'registerForm']);
$router->post('/register', [App\Controllers\AuthController::class, 'register']);

//todo routes
$router->get('/todos', [App\Controllers\TodoController::class, 'index']);
$router->post('/todos', [App\Controllers\TodoController::class, 'store']);
$router->post('/todos', [App\Controllers\TodoController::class, 'toggle']);
$router->post('/todos', [App\Controllers\TodoController::class, 'delete']);

try {
    $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (\RuntimeException $e) {
    http_response_code($e->getCode());
    echo 'Page not found';
}