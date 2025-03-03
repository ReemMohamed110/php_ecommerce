<?php
class CreateReviewsTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `reviews` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` enum('1','2','3','4','5','0') NOT NULL DEFAULT '0',
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   CONSTRAINT `products_reviews_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
   CONSTRAINT `users_review_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)";

        $conn->exec($sql);
    }
}
