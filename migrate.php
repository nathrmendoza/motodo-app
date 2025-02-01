<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//define migration classes here
$migrations = [
    App\Database\Migrations\M001_Users::class,
    App\Database\Migrations\M002_Todos::class
];

foreach ($migrations as $migration) {
    echo "Running migration: " . $migration . PHP_EOL;
    $instance = new $migration();
    $instance->up();
    echo "Migration Successful" . PHP_EOL;
}