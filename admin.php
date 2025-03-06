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
    case 'logic_contact':
        include "controllers/auth/logic_contact.php";
        break;
    case 'logic_login':
        include "controllers/auth/logic_login.php";
        break;
    case 'logic_register':
        include "controllers/auth/logic_register.php";
        break;
    case 'logic_forget_pass':
        include "controllers/auth/logic_forget_pass.php";
        break;
    default:
        include "../view/error/404.php";
        break;
}
