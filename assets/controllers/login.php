<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/user.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';

if ($_POST['token'] != $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
    exit();
}

$user = new user();

include_once "rememberMeCookieAuth.php";

if ($isLoggedIn) {
    $_SESSION['userInfo'] = $user->selectUserByEmail($_COOKIE['member_login'])[0];
    unset($_SESSION['userInfo']['password']);
    header("Location:../../myAccount.php?login=success");
    exit();
}

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

        if (isset($_POST["remember"])) {
            setcookie("member_login", $email, $cookie_expiration_time, "/");

            $random_password = $auth->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time, "/");

            $random_selector = $auth->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time, "/");

            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            // mark existing token as expired
            $userToken = $auth->getTokenByEmail($email, 0);
            if (!empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $auth->insertToken($email, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $auth->clearCookies();
        }
        $_SESSION['userInfo'] = $result[0];
        unset($_SESSION['userInfo']['password']);
        header('location:../../myAccount.php?login=success');
        exit();
    } else {
        header("location:../../login.php?login=failed");
        exit();
    }
}