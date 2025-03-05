<?php

// use Sessions\Sessions;
require_once 'validator.php';
class Sanitize{



    public static function sanitizing($value){
        return htmlspecialchars(trim($value));
    }

    public static function check_request($method){
        $methods = ['GET' , 'POST'];
        if(!in_array($method , $methods)){
            Sessions::flash('errors' , $method . "unsupported request");

        }
    }
}

































?>