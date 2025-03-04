<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// if(session_status() == PHP_SESSION_NONE)session_start();


require_once 'H:/finish projects/PHP_ECOMMERCE/helper/validator.php';
require_once 'H:/finish projects/PHP_ECOMMERCE/helper/sanitizing.php';

class LogicContact
{
    public function contact_validate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $validator = new Validator();
            $sanitizing = new Sanitize();
            $inputs = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'message' => $_POST['msg'],
                'remember_me' => $_POST['remember_me'],
            ];

            $rules = [
                'name' => ['required', 'min' => 4, 'max' => 12],
                'email' => ['required', 'email'],
                'message' => ['required', 'min' => 15, 'max' => 30],
            ];
            
            $validator->validate($inputs , $rules);
            if (!$validator->hasErrors()) {
                $sanitizing->sanitizing($_POST['name']);
                $sanitizing->sanitizing($_POST['email;']);
                $sanitizing->sanitizing($_POST['msg']);

                if($inputs['remember_me']){
                    setcookie('name',$_POST['name'], time()+ 30);
                    setcookie('email',$_POST['email'], time()+ 30);
                }
                
               /*  var_dump($validator->hasErrors());
                exit; */
            }
        }
       /*  header("location:view/auth/contact.php");
        exit; */
    }
}

$logic_contact = new LogicContact();
$logic_contact->contact_validate();
