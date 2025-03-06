<?php
class CreateOrderDetailsTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists`order_details` (
  `quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `total_product_price` float NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  CONSTRAINT `order_order_details_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
   CONSTRAINT `product_order_details_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table order details created successfully.<br>";
} else {
    echo "Error creating table order details: " . $conn->error . "<br>";
}
}
}
