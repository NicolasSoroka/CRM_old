<?php
require "./globals/database.php";
session_start();

$db = Database::getInstance();
if (!isset($_SESSION['logged'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IADE ventas</title>

    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/swiper-bundle.min.css">
    <script src="./css/jquery-3.5.1.min.js"></script>
    <script src="./css/bootstrap.min.js"></script>
    <script src="./css/swiper-bundle.min.js"></script>
    <script src="./css/popper.min.js"></script>
    <style>
        input[type='number'] {
            -moz-appearance: textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Hola <?= $_SESSION['user']['name'];?></a> <img src="<?= $_SESSION['user']['photo'];?>" alt="profile-photo" style="width: 50px; height:50px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="logout.php" class="btn btn-sm btn-danger" type="button">Cerrar Sesion</a>
                </form>
            </div>
        </nav>
    </header>