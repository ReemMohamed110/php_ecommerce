<?php
class CreatePostsTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `posts` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  CONSTRAINT `post_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)

)";
 if ($conn->query($sql) === TRUE) {
    echo "Table posts created successfully.<br>";
} else {
    echo "Error creating table posts: " . $conn->error . "<br>";
}
}
}
