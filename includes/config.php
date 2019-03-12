<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

if (strpos($_SERVER["SCRIPT_NAME"], "index.php") !== false) {
    $CURRENT_PAGE = "Index";
    $PAGE_TITLE = "Welcome to UberKidz!";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "myAccount.php") !== false) {
    $CURRENT_PAGE = "MyAccount";
    $PAGE_TITLE = "My Account";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "login.php") !== false) {
    $CURRENT_PAGE = "MyAccount";
    $PAGE_TITLE = "Login";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "registration.php") !== false) {
    $CURRENT_PAGE = "MyAccount";
    $PAGE_TITLE = "Registration";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "eventDetail.php") !== false) {
    switch ($_GET['from']) {
        case 'events':
            $CURRENT_PAGE = "EntertainmentPackages";
            $PAGE_TITLE = "Entertainment Packages";
            break;
        case 'venues':
            $CURRENT_PAGE = "Venues";
            $PAGE_TITLE = "Venues";
            break;
        case 'menus':
            $CURRENT_PAGE = "Menus";
            $PAGE_TITLE = "Menus";
            break;
    }
} elseif (strpos($_SERVER["SCRIPT_NAME"], "venues.php") !== false) {
    $CURRENT_PAGE = "Venues";
    $PAGE_TITLE = "Venues";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "events.php") !== false) {
    $CURRENT_PAGE = "EntertainmentPackages";
    $PAGE_TITLE = "Entertainment Packages";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "menus.php") !== false) {
    $CURRENT_PAGE = "Menus";
    $PAGE_TITLE = "Menus";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "contactUs.php") !== false) {
    $CURRENT_PAGE = "ContactUs";
    $PAGE_TITLE = "Contact Us";
} elseif (strpos($_SERVER["SCRIPT_NAME"], "FAQ.php") !== false) {
    $CURRENT_PAGE = "FAQ";
    $PAGE_TITLE = "FAQ Page";
} else {
    $CURRENT_PAGE = "Index";
    $PAGE_TITLE = "Welcome to UberKidz!";
}
?>

