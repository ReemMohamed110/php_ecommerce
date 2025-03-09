<?php

use DatabaseManager\DatabaseManager;
include_once __DIR__ . '\..\config\database.php';
include_once __DIR__ . '\..\database\interface.php';
include_once __DIR__ . '\..\database\DatabaseManager.php';

class Category implements categoryInterface
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

    
    public function addCategory($name_en, $name_ar,$image, $status)
    {
        $q = "INSERT INTO categories (name_en,name_ar,image,status) 
        VALUES (:name_en,:name_ar,:image, :status)";
        $sql = $this->db->prepare($q);
        $sql->execute(
            ['name_en' => $name_en,
                'name_ar' => $name_ar,
                'image' => $image,
                'status' => $status,
                
            ]);
        
    }
    public function showCategory()
    {$q = "SELECT * FROM Categories";
        $sql = $this->db->prepare($q);
        $sql->execute();
        $category = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $category;
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