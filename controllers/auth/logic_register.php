<?php

require_once 'H:/finish projects/PHP_ECOMMERCE/helper/validator.php';
require_once 'H:/finish projects/PHP_ECOMMERCE/helper/sanitizing.php';

// echo 'done';

class LogicRegister
{

    public function register_validate()
    {
        $validator = new Validator();
        $sanitizing = new Sanitize();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputs = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];
            $rules = [
                'name' => ['required', 'min' => 3, 'max' => 10],
                'email' => ['required', 'email'],
                'password' => ['required', 'min' => 8, 'max' => 15],
            ];
        }
        $validator->validate($inputs , $rules);
        if(!$validator->hasErrors()){
            $sanitizing->sanitizing($_POST['name']);
            $sanitizing->sanitizing($_POST['email']);
            $sanitizing->sanitizing($_POST['password']);

        }
    }
}
$logic_register = new LogicRegister();
$logic_register->register_validate();
