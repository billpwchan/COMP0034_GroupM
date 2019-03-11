<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

<<<<<<< HEAD
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
=======
switch ($_SERVER["SCRIPT_NAME"]) {
    case "/COMP0034_GroupM/index.php":
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to UberKidz!";
        break;
    case "/COMP0034_GroupM/registration.php":
    case "/COMP0034_GroupM/login.php":
    case "/COMP0034_GroupM/myAccount.php":
        $CURRENT_PAGE = "MyAccount";
        $PAGE_TITLE = "My Account";
        break;
    case "/COMP0034_GroupM/eventDetail.php":
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
        break;
    case "/COMP0034_GroupM/venues.php":
        $CURRENT_PAGE = "Venues";
        $PAGE_TITLE = "Venues";
        break;
    case "/COMP0034_GroupM/events.php":
        $CURRENT_PAGE = "EntertainmentPackages";
        $PAGE_TITLE = "Entertainment Packages";
        break;
    case "/COMP0034_GroupM/menus.php":
        $CURRENT_PAGE = "Menus";
        $PAGE_TITLE = "Menus";
        break;
    case "/COMP0034_GroupM/contactUs.php":
        $CURRENT_PAGE = "ContactUs";
        $PAGE_TITLE = "Contact Us";
        break;
    case "/COMP0034_GroupM/FAQ.php":
        $CURRENT_PAGE = "FAQ";
        $PAGE_TITLE = "FAQ Page";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to UberKidz!";
>>>>>>> parent of 5906fb2a... Complete Test on Home & Login Page via Puppeteer
}
?>

