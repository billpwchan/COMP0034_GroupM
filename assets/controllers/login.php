<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/user.php';

if ($_POST['token'] !== $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
    exit();
}

$user = new user();

if (isset($_POST['email']) and isset($_POST['pass'])) {
    $email = $_POST['email'];
    $password = $_POST["pass"];

    $result = $user->selectUserByEmail($email);
    if (sizeof($result) == 1 && password_verify($password, $result[0]['password'])) {
        if ($result[0]['status'] != 1) {
            $_SESSION['login_status'] = 0;
            header("Location:../../login.php?login=requireActivation");
            exit();
        }
        $_SESSION['userInfo'] = $result[0];
        unset($_SESSION['userInfo']['password']);
        $_SESSION['login_status'] = 1;
        $_SESSION['email'] = $email;
        header("Location:../../myAccount.php?login=success");
        exit();
    } else {
        $_SESSION['login_status'] = 0;
        header("Location:../../login.php?login=failed");
        exit();
    }
}