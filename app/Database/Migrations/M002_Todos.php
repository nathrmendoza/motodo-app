<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use App\Database\Migration;

class M002_Todos extends Migration {
    public function up(): void {
        $sql = "CREATE TABLE IF NOT EXISTS todos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            title VARCHAR(255) NOT NULL,
            is_completed BOOLEAN DEFAULT FALSE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";

        $this->db->exec($sql);
    }

    public function down(): void {
        $this->db->exec("DROP TABLE IF EXISTS toods");
    }
}