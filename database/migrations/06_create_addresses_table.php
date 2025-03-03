<?php
class CreateAddressesTable{

    public function up($conn)
    {
        $sql ="CREATE TABLE if not exists `addresses` (
            `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
            `street` varchar(255) DEFAULT NULL,
            `building` varchar(255) DEFAULT NULL,
            `floor` varchar(255) DEFAULT NULL,
            `flat` varchar(255) DEFAULT NULL,
            `notes` varchar(255) DEFAULT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            `user_id` bigint(20) UNSIGNED NOT NULL,
            CONSTRAINT `user_adress_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
        )";

        $conn->exec($sql);
    }
}