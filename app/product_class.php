<?php
// include_once __DIR__ . '\..\database\config.php';
// include_once __DIR__ . '\..\database\operations.php';
// use PDO;
use DatabaseManager\DatabaseManager;
// relative path -> read => not fixed 
// , absoult path -> read & write => fixed path
include_once __DIR__ . '\..\config\database.php';
include_once __DIR__ . '\..\database\interface.php';
include_once __DIR__ . '\..\database\DatabaseManager.php';

class Product implements productInterface
{
    public $db;
    private $id;
    private $desc_en;
    private $quantity;
    private $desc_ar;
    private $price;
    private $image;
    private $name_ar;
    private $code;
    private $status;
    private $name_en;
    private $brand_id;
    private $subcategory_id;
    private $created_at;
    private $updated_at;
    public function __construct()
    {
        return $this->db = DatabaseManager::getConnection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName_en()
    {
        return $this->name_en;
    }

    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    public function getName_ar()
    {
        return $this->name_ar;
    }


    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
    public function getDesc_en()
    {
        return $this->desc_en;
    }
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    public function getDesc_ar()
    {
        return $this->desc_ar;
    }


    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    public function getBrand_id()
    {
        return $this->brand_id;
    }
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function addProduct($name_en, $name_ar, $price, $quantity, $desc_en, $desc_ar, $image, $code, $status, $brand_id, $category_id)
    {
        $q = "INSERT INTO products (name_en,name_ar,price,quantity,desc_en,desc_ar,image, code,status,brand_id,category_id) 
        VALUES (:name_en,:name_ar,:price,:quantity,:desc_en,:desc_ar,:image, :code,:status,:brand_id,:category_id)";
        $sql = $this->db->prepare($q);
        $sql->execute(
            [
                'name_en' => $name_en,
                'name_ar' => $name_ar,
                'price' => $price,
                'quantity' => $quantity,
                'desc_en' => $desc_en,
                'desc_ar' => $desc_ar,
                'image' => $image,
                'code' => $code,
                'status' => $status,
                'brand_id' => $brand_id,
                'category_id' => $category_id
            ]
        );
    }
    public function showProducts()
    {
        $q = "SELECT * FROM products";
        $sql = $this->db->prepare($q);
        $sql->execute();
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function showEditProduct($id)
    {
        $q = "SELECT * FROM products where id=$id";
        $sql = $this->db->prepare($q);
        $sql->execute();
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function editProduct($id, $name_en, $name_ar, $price, $quantity, $desc_en, $desc_ar, $image, $code, $status, $brand_id, $category_id)
    {$q = "UPDATE products SET name_en = :name_en,name_ar = :name_ar,desc_en = :desc_ar, desc_ar = :desc_ar, price = :price, quantity = :quantity, image = :image, code = :code, status = :status, brand_id = :brand_id, category_id = :category_id WHERE id = :id";
    
        $sql = $this->db->prepare($q);
        $sql->execute([
            ':name_en' => $name_en,
            ':name_ar' => $name_ar,
            ':desc_en' => $desc_en,
            ':desc_ar' => $desc_ar,
            ':price' => $price,
            ':quantity' => $quantity,
            ':image' => $image,
            ':code' => $code,
            ':status' => $status,
            ':brand_id' => $brand_id,
            ':category_id' => $category_id,
            ':id' => $id
        ]);
    }
    public function deleteProduct($id)
    {
        $q = "DELETE FROM products where id=$id";
        $sql = $this->db->prepare($q);
        $sql->execute();
        
    }





    public function getReviews()
    {
        // $query = "SELECT
        //             `reviews`.*,
        //             CONCAT(`users`.`first_name` ,' ', `users`.`last_name`) AS `full_name`
        //         FROM
        //             `reviews`
        //         JOIN `users`
        //         ON `users`.`id` = `reviews`.`user_id`
        //         WHERE
        //             `reviews`.`product_id` = $this->id";

    }
}
