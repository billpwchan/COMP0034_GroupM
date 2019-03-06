<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

if (!isset($_SESSION['userInfo'])) {
    header("Location" . $_SERVER['DOCUMENT_ROOT'] . "/login.php");
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/cart.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';


$_SESSION['cartItems'] = (new cart())->displayCart($_SESSION['userInfo']['user_ID']);