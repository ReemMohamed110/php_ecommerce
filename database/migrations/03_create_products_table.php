<?php
class CreateProductsTable
{

    public function up($conn)
    {
        $sql = "CREATE TABLE if not exists `products` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `desc_en` varchar(100) DEFAULT NULL,
  `desc_ar` varchar(100) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  CONSTRAINT `brands_product_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
   CONSTRAINT `categories_products_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)

)";

        $conn->exec($sql);
    }
}
