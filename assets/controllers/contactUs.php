<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

if ($_POST['token'] !== $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
}
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = mysqli_real_escape_string($connect, $_POST['email']);
    } else {
        header("Location:../../index?status=invalidToken");
    }
}