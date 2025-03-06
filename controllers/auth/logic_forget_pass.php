<?php


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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'logic_register.php';
    $email = htmlspecialchars(trim($_POST['email']));
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (Sessions::has('email') && Sessions::get('email') == $email) {
        $token = bin2hex(random_bytes(32));
        $reset_token_expirey = (time() + 3600);
    }
}
