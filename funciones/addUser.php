<?php
require "../globals/database.php";
$db = Database::getInstance();

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$user = $_POST['user'];
$password = $_POST['password'];
$email = $_POST['email'];
$access = 0; 
$score = 0;

$db->query("INSERT INTO users (`name`, `lastname`, `user`, `password`, `access`, `email`, `score`) VALUES ('$name', '$lastname','$user','$password','$access', '$email', '$score')");
?>