<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/lib/emailValidation.php';
session_start();
if (isset($_SESSION["userInfo"])) {
    header("location:../../login.php");
}
if (empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["cpass"])
    || empty($_POST["gender"]) || empty($_POST["phone"]) || empty($_POST["fname"])
    || empty($_POST["lname"])) {
    header("Location:../../registration.php?registration=allFieldsRequired");
} elseif ($_POST["pass"] != $_POST["cpass"]) {
    header("Location:../../registration.php?registration=passwordMismatch");
} else {
    $register = new emailValidation();
    $result = $register->Register($_POST["fname"], $_POST["lname"], $_POST["gender"], $_POST["email"], $_POST["pass"], $_POST["phone"], $_FILES['avatar'], $_POST["accounttype"]);
    if ($result) {
        header("Location:../../login.php?registration=success");
    } else {
        header("Location:../../index.php?registration=failed");
    }
}


?>
<!doctype html>
<html>
<head></head>
<body></body>
</html>

