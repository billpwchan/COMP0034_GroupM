<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';

if ($_POST['token'] != $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
    exit();
}

$productType = $_POST['event_type'];
$userID = $_SESSION['userInfo']['user_ID'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$created = date('Y-m-d H:i:s');
$eventImage1 = $_FILES['image1'];
$eventImage2 = $_FILES['image2'];
$eventImage3 = $_FILES['image3'];

switch (strtolower($productType)) {
    case 'entertainment':
        $duration = $_POST['duration'];
        break;
    case 'venue':
        $address = $_POST['address'];
        $capacity = $_POST['capacity'];
        $region = $_POST['region'];
        $event->insertVenue($userID, 'venue', $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3, $address, $capacity, $region);
        break;
    case 'menu':
        $duration = $_POST['duration'];
        break;
}

//$fileName = $avatar['name'];
//$fileTmpName = $avatar['tmp_name'];
//$uploadPath = $uploadDirectory . basename($fileName);
//
//move_uploaded_file($fileTmpName, $uploadPath);