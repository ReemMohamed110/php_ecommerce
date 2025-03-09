<?php 
interface userInterface {
    function create($name, $email, $phone, $password, $gender, $role);
    function login($email,$password);
    function forgetPassword();

}
interface productInterface {
    function addProduct($name_en,$name_ar,$price,$quantity,$desc_en,$desc_ar,$image, $code,$status,$brand_id, $category_id);
    function showProducts();
    // function update();
    // function delete();
}
interface cartInterface {
    // function create();
    // function read();
    // function update();
    // function delete();
}
interface brandInterface {
    function addBrand($name_en, $name_ar,$image, $status);
    function showBrands();
    // function update();
    // function delete();
}
interface categoryInterface {
    function addCategory($name_en, $name_ar,$image, $status);
    function showCategory();
    // function update();
    // function delete();
}