<?php
class CreateOrdersTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `orders` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
   CONSTRAINT `order_address_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
   CONSTRAINT `order_shipping_fk` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`id`),
   CONSTRAINT `order_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)

)";
 if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully.<br>";
} else {
    echo "Error creating table orders: " . $conn->error . "<br>";
}
}
}