<?php 

include "../../app/product_class.php";
include "../../app/Category_class.php";
include "../../app/Brand_class.php";
$productObj = new Product;
$categoryObj = new Category;
$brandObj = new Brand;
if(isset($_GET['id'])){
    $id=$_GET['id'];
    if($_GET['tittle'] == "product") {
     $productObj->deleteProduct($id);
     header("location:".$_SERVER['HTTP_REFERER']);
     exit;
    }
    if($_GET['tittle'] == "category") {
        $categoryObj->deleteCategory($id);
        header("location:".$_SERVER['HTTP_REFERER']);
        exit;
    }
    if($_GET['tittle'] == "brand") {
        $brandObj->deleteBrand($id);
        header("location:".$_SERVER['HTTP_REFERER']);
        exit;
    }
}
