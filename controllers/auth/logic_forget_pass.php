<?php
require_once '../../database/DatabaseManager.php';
require_once '../../app/user_class.php';

/*
Implementing a Forgot Password function :
1-Create a Forgot Password form
2-Validate user input.
3-Generate a unique reset token =>  generate a unique token that will be used to identify the user and allow them to reset their password
                                => This token should be long, random, and unique to prevent brute-force attacks.
4-Store the reset token. After that, store the reset token in a database along with the user ID and an expiration
5-Send an email to the user.
6-Create a reset password form.
7-Validate the reset token
8-Update the password. If the reset token is valid, update the user’s password in the database.
*/

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = trim($_POST['email']) ;

$user =new User();
$token = $user->forgetPassword($email);

if($token){
    $reset_link = "http://yourwebsite.com/reset-password.php?token=" . $token;
$subject = "Reset Your Password";
$message = "Click the following link to reset your password: " . $reset_link;
$headers = "From: support@drophunt.com";

mail($email, $subject, $message, $headers);
}else {
    return false ;
}

}