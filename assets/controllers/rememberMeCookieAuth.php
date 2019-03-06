<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/auth.php';
$auth = new auth();

// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 month
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

$isLoggedIn = false;

// Check if loggedin session and redirect if session exists
if (!empty($_SESSION["userInfo"])) {
    $isLoggedIn = true;
} // Check if loggedin session exists
else if (!empty($_COOKIE["member_login"]) && !empty($_COOKIE["random_password"]) && !empty($_COOKIE["random_selector"])) {
    // Initiate auth token verification diirective to false
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;

    // Get token for username
    $userToken = $auth->getTokenByEmail($_COOKIE["member_login"], 0);
    $_SESSION['email'] = $_COOKIE['member_login'];

    // Validate random password cookie with database
    if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
        $isPasswordVerified = true;
    }

    // Validate random selector cookie with database
    if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
        $isSelectorVerified = true;
    }

    // check cookie expiration by date
    if ($userToken[0]["expiry_date"] >= $current_date) {
        $isExpiryDateVerified = true;
    }

    // Redirect if all cookie based validation retuens true
    // Else, mark the token as expired and clear cookies
    if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDateVerified) {
        $isLoggedIn = true;
    } else {
        if (!empty($userToken[0]["id"])) {
            $auth->markAsExpired($userToken[0]["id"]);
        }
        // clear cookies
        $auth->clearCookies();
    }
}
?>