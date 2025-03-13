
<?php
class CreateCommentsTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `comments` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `content` varchar(50) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   CONSTRAINT `post_comment_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
   CONSTRAINT `user_coment_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)";
 if ($conn->query($sql) === TRUE) {
    echo "Table comment created successfully.<br>";
} else {
    echo "Error creating table comment: " . $conn->error . "<br>";
}
}
}