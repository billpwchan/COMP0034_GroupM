<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/event.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$event = new event();

$productID = isset($_GET['id']) ? $_GET['id'] : 1;
$productID = (int)$productID;
if ($_GET['from'] === "") {
    header("location:index.php");
}
$previousURL = $_GET['from'];
switch ($previousURL) {
    case 'events':
        $productType = 'entertainment';
        $entertainers = $event->read_entertainer_detail($productID);
        $productDetails = $event->read_event_detail($productID, $productType);
        break;
    case 'menus':
        $productType = 'menu';
        $menus = $event->read_menuItem_detail($productID);
        $productDetails = $event->read_menu_detail($productID, $productType);
        break;
    case 'venues':
        $productType = 'venue';
        $productDetails = $event->read_venue_detail($productID, $productType);
        break;
    default:
        $productType = 'Invalid';
}

if (!isset($productDetails) || sizeof($productDetails) != 1) {
    header("location:{$previousURL}.php?display=invalid");
} else {
    $productDetails = $productDetails[0];
}