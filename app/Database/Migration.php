<?php

declare(strict_types=1);

namespace App\Database;

use App\Core\Database;
use PDO;

abstract class Migration {
    protected PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    abstract public function up(): void;
    abstract public function down(): void;
}