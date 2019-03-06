<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/user.php';
$user = new user();
$methodID = $_POST['methodID'];
$userID = $_SESSION['userInfo']['user_ID'];

if ($methodID == 1) {
    $new_first_name = $_POST['new_first_name'];
    $user->updateFirstName($new_first_name, $userID);
};
if ($methodID == 2) {
    $new_last_name = $_POST['new_last_name'];
    $user->updateLastName($new_last_name, $userID);
};

if ($methodID == 4) {
    $new_contact_number = $_POST['new_contact_number'];
    $user->updatePhone($new_contact_number, $userID);
};

