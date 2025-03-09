<?php

use DatabaseManager\DatabaseManager;
include_once __DIR__ . '\..\config\database.php';
include_once __DIR__ . '\..\database\interface.php';
include_once __DIR__ . '\..\database\DatabaseManager.php';

class Brand implements brandInterface
{
    public $db;
    private $id;
    private $image;
    private $name_ar;
    private $status;
    private $name_en;
    private $created_at;
    private $updated_at;
    public function __construct()
    {
        return $this->db = DatabaseManager::getConnection();
    }

    
    public function addBrand($name_en, $name_ar,$image, $status)
    {
        $q = "INSERT INTO brands (name_en,name_ar,image,status) 
        VALUES (:name_en,:name_ar,:image, :status)";
        $sql = $this->db->prepare($q);
        $sql->execute(
            ['name_en' => $name_en,
                'name_ar' => $name_ar,
                'image' => $image,
                'status' => $status,
                
            ]);
        
    }
    public function showBrands()
    {$q = "SELECT * FROM Brands";
        $sql = $this->db->prepare($q);
        $sql->execute();
        $brands = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $brands;
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }

}