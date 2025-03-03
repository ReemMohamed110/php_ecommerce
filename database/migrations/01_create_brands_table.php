<?php
class CreateBrandsTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `brands` (
        `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
        `name_en` varchar(255) NOT NULL,
        `name_ar` varchar(255) NOT NULL,
        `status` int(1) NOT NULL DEFAULT 1,
        `image` varchar(100) DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      )";

        $conn->exec($sql);
    }
}
