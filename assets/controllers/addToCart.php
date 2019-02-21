<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
$connect = db_connect();
if (!isset($_SESSION)) {
    session_start();
}
$previousURL = $_GET['from'];
if (!isset($_SESSION['userInfo'])) {
    header("location:../../login.php");
}
$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);
$product_id = isset($_GET['id']) ? mysqli_real_escape_string($connect, $_GET['id']) : "";
$quality = isset($_GET['service']) ? mysqli_real_escape_string($connect, $_GET['service']) : "basic";
$eventStartTime = isset($_GET['eventStartTime']) ? mysqli_real_escape_string($connect, $_GET['eventStartTime']) : date("YYYY-MM-DD HH:MM:SS");
$eventLocation = isset($_GET['eventLocation']) ? mysqli_real_escape_string($connect, $_GET['eventLocation']) : "";
$price = mysqli_real_escape_string($connect, $_GET['productPrice']);

$sql = "SELECT quantity
FROM cart
WHERE event_ID = {$product_id} 
AND user_ID = {$userID}
AND quality = '{$quality}'
AND eventLocation = '{$eventLocation}'
AND eventStartTime BETWEEN
";
$result = db_select($sql);

if (sizeof($result) === 0) {
//    $sql = "SELECT event.event_type
//    FROM event
//    WHERE event_ID = {$product_id}
//    ";
//    $result = db_select($sql);
//    switch ($result['event_type']) {
//        case "entertainment":
//            $sql = "SELECT duration FROM entertainmentpackage WHERE event_ID = {$product_id}";
//            break;
//        case "menu":
//            $sql = "SELECT duration FROM menu WHERE event_ID = {$product_id}";
//            break;
//        case "venue":
//            $sql = "SELECT address, capacity, region FROM venue WHERE event_ID = {$product_id}";
//            break;
//    }
    $sql = "INSERT INTO cart (user_ID, event_ID, quantity, quality, eventStartTime, eventLocation, price) VALUES ({$userID}, {$product_id}, 1, '{$quality}', {$eventStartTime}, '{$eventLocation}', {$price})";
    $result = db_query($sql);
} else {
//    $quantity = (int)$result[0]['quantity'];
//    $quantity = $quantity + 1;
//    $sql = "UPDATE cart
//            SET user_ID = $userID, event_ID = $product_id, quantity = $quantity
//            WHERE event_ID = $product_id and user_ID = $userID";
//    $result = db_query($sql);
    header("location: ../../{$previousURL}.php?addtocart=failed");
}

if ($result) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    header("location:../../{$previousURL}.php?addtocart=success");
}
