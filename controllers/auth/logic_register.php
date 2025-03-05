<?php

if (session_status() == PHP_SESSION_NONE) session_start();
include "../helper/Sessions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $name = !empty($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : null;
    $email = !empty($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null;
    $phone = !empty($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : null;
    $password = !empty($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : null;
    $confirm_password = !empty($_POST['confirm_password']) ? htmlspecialchars(trim($_POST['confirm_password'])) : null;
    $gender = !empty($_POST['gender']) ? htmlspecialchars(trim($_POST['gender'])) : null;
    $role = !empty($_POST['role']) ? htmlspecialchars(trim($_POST['role'])) : null;
    
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
    if (empty($gender)) {
        Sessions::set("gender", "gender is required");
    }
    if (empty($role)) {
        Sessions::set("role", "role is required");
    }
    // if(!isset($_SESSION['name'])&&!isset($_SESSION['email'])&&!isset($_SESSION['phone'])&&!isset($_SESSION['password'])&&!isset($_SESSION['confirm_password'])){

    // }
    if (!Sessions::has('email') == "true" && !Sessions::has('password')=="true" && !Sessions::has('name')=="true"&& !Sessions::has('confirm_password')=="true" && !Sessions::has('gender')=="true" && !Sessions::has('role')=="true" ) {
        
        // header("location:" . $_SERVER['HTTP_REFERER']);
        header("location:public/index.php?page=home");
        
    } else{
        Sessions::set("fail", "failed to register");
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
