<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static ?self $instance = null;
    private PDO $connection;

    public static __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host=" . $_ENV['DB_HOST'] .
                ";dbname=" . $_ENV['DB_NAME'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            throw new PDOException("Connection failed: ", $e->getMessage());
        }
    }

    public static function getInstance(): self {
        if (self:$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}