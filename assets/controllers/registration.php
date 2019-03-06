<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/user.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
echo $_SESSION['token'];
echo $_POST['token'];
if ($_POST['token'] != $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
    exit();
}

if (isset($_SESSION["userInfo"])) {
    header("location:../../login.php");
    exit();
}

if (empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["cpass"])
    || empty($_POST["gender"]) | empty($_POST["fname"])
    || empty($_POST["lname"])) {
    header("Location:../../registration.php?registration=allFieldsRequired");
    exit();
} elseif ($_POST["pass"] != $_POST["cpass"]) {
    header("Location:../../registration.php?registration=passwordMismatch");
    exit();
} else {
    $user = new user();
    $result = $user->register($_POST["fname"], $_POST["lname"], $_POST["gender"], $_POST["email"], $_POST["pass"], $_POST["phone"], $_FILES['avatar'], $_POST["accounttype"]);
    if ($result) {
        header("Location:../../login.php?login=requireActivation");
        exit();
    } else {
        header("Location:../../index.php?registration=failed");
        exit();
    }
}


?>
<!doctype html>
<html>
<head></head>
<body></body>
</html>

