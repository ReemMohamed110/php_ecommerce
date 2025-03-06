<?php
class CreateShippingProductTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `shipping_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
   CONSTRAINT `shipp_fk` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`id`)
)";
 if ($conn->query($sql) === TRUE) {
    echo "Table shipping order created successfully.<br>";
} else {
    echo "Error creating table shipping order: " . $conn->error . "<br>";
}
}
}
