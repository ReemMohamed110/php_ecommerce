<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include "../helper/Sessions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = !empty($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null;
    $password = !empty($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : null;
    // var_dump($_POST['email'],$_POST['password']);

    //email validation
    if ($email == null) {
        Sessions::set("email", "email is required");
        
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Sessions::set("email", "invalid email format");
        
        }
    }

    //password validation
    if (empty($password)) {
        Sessions::set("password", "password is required");
        // $_SESSION['password'] = "password is required";
        // header("location:" . $_SERVER['HTTP_REFERER']);
    } else {
        if (strlen($password) < 2 || strlen($password) > 20) {
            Sessions::set("password", "invalid password");
            // $_SESSION['password'] = "invalid password";
            // header("location:" . $_SERVER['HTTP_REFERER']);
        }
    }


    // if(!isset($_SESSION['name'])&&!isset($_SESSION['email'])&&!isset($_SESSION['phone'])&&!isset($_SESSION['password'])&&!isset($_SESSION['confirm_password'])){

    // }
    if (!Sessions::has('email') == "true" && !Sessions::has('password') == "true") {

        // header("location:" . $_SERVER['HTTP_REFERER']);
        header("location:public/index.php?page=home");
    } else {
        Sessions::set("fail", "failed to register");
        header("location:" . $_SERVER['HTTP_REFERER']);
        // header("location:public/index.php?page=home");
        // header("location:" . $_SERVER['HTTP_REFERER']);

    }
}



// if (session_status() == PHP_SESSION_NONE) session_start();
// include "../helper/Sessions.php";


// use Validator\Validator;
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {


//     $email = !empty($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null;
//     $password = !empty($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : null;


    
//     if (empty($email)) {
//         Sessions::set("email", "email is required to login");
//     } else {
//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             Sessions::set("email", "email is invalid");
//         }
//     }

//     if (empty($password)) {
//         Sessions::set("password", "password is required to login");
//     } else {
//         if (strlen($password) < 3|| strlen($password) > 20) {
//             Sessions::set("password", "password must be greater than 3 char");
//         }
//     }

//     if (!Sessions::has('password') && !Sessions::has('email')) {
//         Sessions::set("success", "you have login successfully");
//     }
//     if (Sessions::has('password') || Sessions::has('email')) {
//         header("location:" . $_SERVER['HTTP_REFERER']);
//         exit; 
//     } else {
//         header("location:public/index.php?page=home");
//         exit;
//     }
    
//     // if (Sessions::has('password') != "true" && Sessions::has('email') != "true") {
//     //     Sessions::set("success", "you have login successfully");
//     // }
//     // if (Sessions::has('password') == "true" || Sessions::has('email') == "true") {
//     //    header("location:" . $_SERVER['HTTP_REFERER']);
//     //     exit; 
//     // } else {
//     //     header("location:public/index.php?page=home");
//     //     exit;
//     // }
// }
