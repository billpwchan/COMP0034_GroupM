<?php
include "dbConnect.php";
$connect = db_connect();
session_start();

if (isset($_POST['email']) and isset($_POST['pass'])) {
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = md5(mysqli_real_escape_string($connect, $_POST["pass"]));
    $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
    $result = db_select($sql);
    if (sizeof($result) == 1) {
        $_SESSION['userInfo'] = $result[0];
        unset($_SESSION['userInfo']['pass']);
        $_SESSION['email'] = $email;
        $_SESSION['login_status'] = 1;
        header("Location:../../myAccount.php?login=success");
    } else {
        $_SESSION['login_status'] = 0;
        header("Location:../../index.php?login=failed");
    }
}