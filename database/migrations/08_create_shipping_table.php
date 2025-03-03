<?php
class CreateShippingTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists`shipping` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Method` varchar(255) NOT NULL,
  `Status` enum('Pending','Processing','Shipped','delivered','Cancelled') NOT NULL,
  `cost` float NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  CONSTRAINT `user_shipping_fk` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
)";

        $conn->exec($sql);
    }
}
