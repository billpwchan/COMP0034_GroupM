<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/user.php';

if (!empty($_GET['key']) && isset($_GET['key'])) {
    $key = $_GET['key'];

    $user = new user();
    if ($user->activateAccount($key)) {
        echo 'Your account is activated, please <a href="login.php">click here</a> to to login';
        header("refresh:5;url=login.php");
        exit();
    } else {
        echo "Invalid Activation Key!";
    }
} else {
    echo "Null activation key!";
}

?>