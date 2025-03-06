<?php

class CreateBrandsTable
{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS brands (
            id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
            name_en VARCHAR(255) NOT NULL,
            name_ar VARCHAR(255) NOT NULL,
            status INT(1) NOT NULL DEFAULT 1,
            image VARCHAR(100) DEFAULT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table brands created successfully.<br>";
        } else {
            echo "Error creating table brands: " . $conn->error . "<br>";
        }
    }
}