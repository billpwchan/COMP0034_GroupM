<?php
include("dbConnect.php");
$connect = db_connect();
if (!isset($_SESSION)) {
    session_start();
}

$productID = isset($_GET['id']) ? $_GET['id'] : 1;
$productID = (int)mysqli_real_escape_string($connect, $productID);
$previousURL = $_GET['from'];
switch ($previousURL) {
    case 'events':
        $productType = 'entertainment';
        break;
    case 'menus':
        $productType = 'menu';
        break;
    case 'venues':
        $productType = 'venues';
        break;
    default:
        $productType = 'Invalid';
}
$productDetails = read_product_detail($productID, $productType);
if (sizeof($productDetails) != 1) {
    header("location:{$previousURL}.php?display=invalid");
} else {
    $productDetails = $productDetails[0];
}

function read_product_detail($productID, $productType)
{
    $sql = "
    SELECT event.event_ID, event.provider_ID, event.event_type, event.name, event.price, event.description, event.created, event.eventimage1, event.eventimage2, event.eventimage3, entertainmentpackage.duration
    FROM event, entertainmentpackage
    WHERE event.event_ID = entertainmentpackage.event_ID
    AND event.event_ID = {$productID}
    AND event.event_type = '{$productType}'
    ";
    return db_select($sql);
}

