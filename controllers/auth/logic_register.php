<?php

if (session_status() == PHP_SESSION_NONE) session_start();
include "helper/Sessions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    Sessions::set('email' , $email); //to use this in forget password
    //name validation
    if (empty($name)) {
        Sessions::set("name", "name is required");
    } elseif (strlen($name) < 3) {
        Sessions::set("name", "name must be great than 2 char");
        
    } elseif (is_numeric($name)) {
        Sessions::set("name", "name must not be numeric");
       
    }
    //email validation
    if (empty($email)) {
        Sessions::set("email", "email is required");
        
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Sessions::set("email", "invalid email format");
            
        }
    }
    //phone validation
    if (empty($phone)) {
        Sessions::set("phone", "phone is required");
        
    } else {
        if (!is_numeric($phone)) {
            Sessions::set("phone", "invalid phone number");
            // $_SESSION['phone'] = "invalid phone number";
            // header("location:" . $_SERVER['HTTP_REFERER']);
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

    if (empty($confirm_password)) {
        Sessions::set("confirm_password", "confirm password is required");
        
    } else {
        if ($confirm_password !== $password) {
            Sessions::set("confirm_password", "confirm password not confirmed");
            // $_SESSION['confirm_password'] = "confirm password not confirmed";
            // header("location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    // if(!isset($_SESSION['name'])&&!isset($_SESSION['email'])&&!isset($_SESSION['phone'])&&!isset($_SESSION['password'])&&!isset($_SESSION['confirm_password'])){

    // }
    if (!Sessions::has('email') == "true" || !Sessions::has('password')=="true") {
        
        header("location:" . $_SERVER['HTTP_REFERER']);
        // header("location:public/index.php?page=home");
        
    } elseif(Sessions::has('email') !== "true" && Sessions::has('password')!=="true"){
        Sessions::set("success", "message sent successfully");
        header("location:" . $_SERVER['HTTP_REFERER']);
        // header("location:public/index.php?page=home");
        // header("location:" . $_SERVER['HTTP_REFERER']);
        
    }
}

// require_once '../../helper/validator.php';
// require_once '../../helper/sanitizing.php';
// use Validator\Validator;
// // echo 'done';
// // die;

// class LogicRegister
// {

//     public function register_validate()
//     {
//         $validator = new Validator();
//         $sanitizing = new Sanitize();
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $inputs = [
//                 'name' => $_POST['name'],
//                 'email' => $_POST['email'],
//                 'password' => $_POST['password'],
//             ];
//             $rules = [
//                 'name' => ['required', 'min' => 3, 'max' => 10],
//                 'email' => ['required', 'email'],
//                 'password' => ['required', 'min' => 8, 'max' => 15],
//             ];
//         }
//         $validator->validate($inputs , $rules);
//         if(!$validator->hasErrors()){
//             $sanitizing->sanitizing($_POST['name']);
//             $sanitizing->sanitizing($_POST['email']);
//             $sanitizing->sanitizing($_POST['password']);

//         }
//     }
// }
// $logic_register = new LogicRegister();
// $logic_register->register_validate();
