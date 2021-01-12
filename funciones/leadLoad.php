<?php
require "../globals/database.php";
$db = Database::getInstance();

$name = $_POST['name'];
$email = $_POST['email'];
$description = $_POST['description'];
$phone = $_POST['phone'];
$time = $_POST['time'];
$course = $_POST['course'];
$label = 0;

$db->query("INSERT INTO leads (`phone`, `email`, `name`, `contactTime`, `description`, `label`, `course` ) VALUES ('$phone', '$email', '$name', '$time', '$description', '$label', '$course')");

echo "ok";
?>