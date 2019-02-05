<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
$connect = db_connect();
session_start();

if (isset($_POST['email']) and isset($_POST['pass'])) {
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = md5(mysqli_real_escape_string($connect, $_POST["pass"]));
    $sql = "SELECT * FROM user WHERE email_address = '$email' and password = '$password'";
    $sql = "
    SELECT user_ID, first_name, last_name, gender, email_address, password, contact_number, registration_date, avatar
    FROM user
    WHERE email_address = '{$email}'
    AND password = '{$password}'
    ";
    $result = db_select($sql);
    if (sizeof($result) == 1) {
        $_SESSION['userInfo'] = $result[0];

        unset($_SESSION['userInfo']['pass']);
        $_SESSION['login_status'] = 1;
        $_SESSION['email'] = $email;
        header("Location:../../myAccount.php?login=success");
    } else {
        $_SESSION['login_status'] = 0;
        header("Location:../../login.php?login=failed");
    }
}