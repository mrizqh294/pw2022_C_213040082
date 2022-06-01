<?php 
require 'function.php';

$password = "asdfghjkl";


$user = query("SELECT * FROM admin WHERE username_admin = 'anggi' ");
var_dump(password_verify ($password, $user[0]['password_admin']));

$data = query("SELECT * FROM admin WHERE username_admin = 'anggi' ");

var_dump($data)

 ?>