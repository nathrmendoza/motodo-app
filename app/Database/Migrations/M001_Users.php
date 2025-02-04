<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use App\Database\Migration;

class M001_Users extends Migration {
    public function up(): void {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        $this->db->exec($sql);
    }

    public function down(): void {
        $this->db->exec("DROP TABLE IF EXISTS users");
    }
}

