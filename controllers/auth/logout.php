<?php 
session_start();

unset($_SESSION['user_email']);
header("location:public/index.php");
exit;
?>