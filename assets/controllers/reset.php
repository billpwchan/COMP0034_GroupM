<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/user.php';
$auth = new auth();
$user = new user();

$selector = $_POST['selector'];
$time = time();

$result = $auth->checkResetExpiry($selector, $time);
if (empty($result)) {
    header("location:../../reset.php?status=failed");
    exit();
} else {
    $auth_token = $result[0];
    $validator = $_POST['validator'];
    $calc = hash('sha256', hex2bin($validator));
    if (hash_equals($calc, $auth_token['token'])) {
        $email = $auth_token['email'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        $user->updatePassword($password, $email);
        $auth->clearResetLink($email);

        session_destroy();
        header("location:../../reset.php?status=success");
        exit();
    } else {
        header("location:../../reset.php?status=failed");
        exit();
    }
}
