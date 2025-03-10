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
interface BlogInterface {
    public function create(array $data, $file);
    public function read(int $id);
    public function update(int $id, array $data, $file = null);
    public function delete(int $id);
    public function getAll();
}