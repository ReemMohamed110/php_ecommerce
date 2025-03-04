<?php
$page = isset($_GET['page']) ? $_GET['page'] : "home";
// var_dump($page);
// die;
switch ($page) {

    case 'admin':
        
        include "public/indexAdmin.php";
        // echo "ok";
        // die;
        break;

    default:
        include "../view/error/404.php";
        break;
}
