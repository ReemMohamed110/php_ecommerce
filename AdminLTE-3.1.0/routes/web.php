<?php
echo "ok";
die;
$page = isset($_GET['page']) ? $_GET['page'] : "home";
var_dump($page);
die;
switch ($page) {
    case 'home':
        include "../index2.html";
        break;
    case 'addProduct':
        include "addProduct.php";
        break;
    case 'allProducts':
        
        include "allProducts.php";
        break;
        
}
