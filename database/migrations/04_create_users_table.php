<?php
class CreateUsersTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `users` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `gender` ENUM('male','female') NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `code` varchar(1) NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)";
 if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully.<br>";
} else {
    echo "Error creating table users: " . $conn->error . "<br>";
}
}
}
