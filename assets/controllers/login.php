<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

if ($_POST['token'] !== $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
}
if (isset($_POST['email']) and isset($_POST['pass'])) {
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["pass"]);
    $sql = "
    SELECT user_ID, first_name, last_name, gender, email_address, password, contact_number, registration_date, avatar, status
    FROM user
    WHERE email_address = '{$email}'
    ";
    $result = db_select($sql);
    print_r($result);
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
    } else {
        $_SESSION['login_status'] = 0;
        header("Location:../../login.php?login=failed");
    }
}