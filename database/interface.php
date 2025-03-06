<?php 
interface userInterface {
    function create($name, $email, $phone, $password, $gender, $role);
    function login($email,$password);
    function forgetPassword();

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