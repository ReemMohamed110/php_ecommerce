<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include "../helper/Sessions.php";


// use Validator\Validator;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = !empty($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : null;
    $email = !empty($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null;
    $message = !empty($_POST['msg']) ? htmlspecialchars(trim($_POST['msg'])) : null;


    if (empty($email)) {
        Sessions::set("email", "email is required to contact");
       
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Sessions::set("email", "email is invalid");
        }
    }

    if (empty($name)) {
        Sessions::set("name", "name is required to contact");
    } else {
        if (strlen($name) < 2 || strlen($name) > 20) {
            Sessions::set("name", "name must be greater than 2 char");
        }
    }
    if (empty($message)) {
        Sessions::set("message", "message is required ");
    } else {
        if (strlen($message) < 2 || strlen($message) > 20) {
            Sessions::set("message", "name must be greater than 2 char");
        }
    }
   
    if (Sessions::has('name') !== "true" && Sessions::has('email') !== "true" && Sessions::has('message') != "true") {
        Sessions::set("success", "message sent successfully");
        
        
    }
    
        
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
        
    
} 

?>
<?php

// use Sessions\Sessions;
// include "../helper/Sessions.php";
// include "../helper/validator.php";
// include "../helper/sanitizing.php";
// require_once '../../helper/validator.php';
// require_once __DIR__ . '/../../helper/validator.php';

// require_once '../../helper/sanitizing.php';

// class LogicContact
// {
//     public function contact_validate()
//     {
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//             $validator = new Validator();

//             $sanitizing = new Sanitize();
//             $inputs = [
//                 'name' => $_POST['name'],
//                 'email' => $_POST['email'],
//                 'message' => $_POST['msg'],
//                 'remember_me' => $_POST['remember_me']
//             ];

//             $rules = [
//                 'name' => ['required', 'min' => 4, 'max' => 12],
//                 'email' => ['required', 'email'],
//                 'message' => ['required', 'min' => 15, 'max' => 30],
//             ];

//             $validator->validate($inputs, $rules);
//             if (!$validator->hasErrors()) {
//                 $sanitizing->sanitizing($_POST['name']);
//                 $sanitizing->sanitizing($_POST['email;']);
//                 $sanitizing->sanitizing($_POST['msg']);

//                 if ($inputs['remember_me']) {
//                     setcookie('name', $_POST['name'], time() + 30);
//                     setcookie('email', $_POST['email'], time() + 30);
//                 }

//                 /*  var_dump($validator->hasErrors());
//                 exit; */
//             }
//         }
//         /*  header("location:view/auth/contact.php");
//         exit; */
//     }
// }

// $logic_contact = new LogicContact();
// $logic_contact->contact_validate();

// // header("location:".$_SERVER['HTTP_REFERER']);
?>