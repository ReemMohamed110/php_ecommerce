<?php 
interface userInterface {
    function create($name, $email, $phone, $password, $gender, $role);
    function login($email, $password);
    function forgetPassword($email); 
}
interface productInterface {
    function create();
    function read();
    function update();
    function delete();
}
interface cartInterface {
    function create();
    function read();
    function update();
    function delete();
}