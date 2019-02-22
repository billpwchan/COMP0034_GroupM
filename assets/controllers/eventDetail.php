<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

$productID = isset($_GET['id']) ? $_GET['id'] : 1;
$productID = (int)mysqli_real_escape_string($connect, $productID);
if ($_GET['from'] === "") {
    header("location:index.php");
}
$previousURL = $_GET['from'];
switch ($previousURL) {
    case 'events':
        $productType = 'entertainment';
        $entertainers = read_entertainer_detail($productID);
        $productDetails = read_event_detail($productID, $productType);
        break;
    case 'menus':
        $productType = 'menu';
        $menus = read_menuItem_detail($productID);
        $productDetails = read_menu_detail($productID, $productType);
        break;
    case 'venues':
        $productType = 'venue';
        $productDetails = read_venue_detail($productID, $productType);
        break;
    default:
        $productType = 'Invalid';
}

if (!isset($productDetails) || sizeof($productDetails) != 1) {
    header("location:{$previousURL}.php?display=invalid");
} else {
    $productDetails = $productDetails[0];
}

function read_event_detail($productID, $productType)
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

function read_menu_detail($productID, $productType)
{
    $sql = "
    SELECT event.event_ID, event.provider_ID, event.event_type, event.name, event.price, event.description, event.created, event.eventimage1, event.eventimage2, event.eventimage3, menu.duration
    FROM event, menu
    WHERE event.event_ID = menu.event_ID
    AND event.event_ID = {$productID}
    AND event.event_type = '{$productType}'
    ";
    return db_select($sql);
}

function read_venue_detail($productID, $productType)
{
    $sql = "
    SELECT event.event_ID, event.provider_ID, event.event_type, event.name, event.price, event.description, event.created, event.eventimage1, event.eventimage2, event.eventimage3, address, capacity, region
    FROM event, venue
    WHERE event.event_ID = venue.event_ID
    AND event.event_ID = {$productID}
    AND event.event_type = '{$productType}'
    ";
    return db_select($sql);
}

function read_entertainer_detail($productID)
{
    $sql = "
    SELECT name, skill 
    FROM entertainmentpackage, entertainmentpackagemap, entertainer
    WHERE entertainmentpackage.event_ID = entertainmentpackagemap.entertainment_ID
    AND entertainmentpackagemap.entertainer_ID = entertainer.entertainer_ID
    AND entertainmentpackage.event_ID = {$productID}
    ";
    return db_select($sql);
}

function read_menuItem_detail($productID)
{
    $sql = "
    SELECT quantity, name
    FROM menu, menumap, menuitem
    WHERE menu.event_ID = menumap.event_ID
    AND menumap.menuitem_ID = menuitem.menuitem_ID
    AND menu.event_ID = {$productID}
    ";
    return db_select($sql);
}
