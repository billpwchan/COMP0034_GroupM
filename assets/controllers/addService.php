<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/event.php';

if ($_POST['token'] != $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
    exit();
}
$event = new event();

$productType = $_POST['event_type'];
$userID = $_SESSION['userInfo']['user_ID'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$created = date('Y-m-d H:i:s');
$eventImage1 = $_FILES['image1']['name'];
$eventImage2 = $_FILES['image2']['name'];
$eventImage3 = $_FILES['image3']['name'];

switch (strtolower($productType)) {
    case 'entertainment':
        $duration = $_POST['duration'];
        $entertainers = $_POST['entertainers'];
        $event->insertEntertainmentPackage($userID, 'entertainment', $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3, $duration, $entertainers);
        break;
    case 'venue':
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $postcode = $_POST['post_code'];
        $capacity = $_POST['capacity'];
        $region = $_POST['region'];
        $event->insertVenue($userID, 'venue', $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3, $address1, $address2, $postcode, $capacity, $region);
        break;
    case 'menu':
        $duration = $_POST['duration'];
        $menuItems = $_POST['menuItems'];
        $event->insertMenu($userID, 'menu', $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3, $duration, $menuItems);
        break;
}
header("location:../../myAccount.php");

