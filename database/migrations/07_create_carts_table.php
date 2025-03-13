
<?php
class CreateCartsTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `carts` (
         `product_id` bigint(20) UNSIGNED NOT NULL,
         `user_id` bigint(20) UNSIGNED NOT NULL,
         `quantity` int(11) NOT NULL,
          CONSTRAINT `cart_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
          CONSTRAINT `user_cart_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
            )";
 if ($conn->query($sql) === TRUE) {
    echo "Table carts created successfully.<br>";
} else {
    echo "Error creating table carts: " . $conn->error . "<br>";
}
}
}
