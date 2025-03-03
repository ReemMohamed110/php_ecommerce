<?php
class CreateLikesTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `likes` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
   CONSTRAINT `comment_like_fk` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
   CONSTRAINT `post_like_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
    )";

        $conn->exec($sql);
    }
}
