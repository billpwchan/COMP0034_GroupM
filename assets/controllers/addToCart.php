<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';

$previousURL = $_GET['from'];
if (!isset($_SESSION['userInfo'])) {
    header("location:../../login.php");
}
$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);
$product_id = isset($_GET['id']) ? mysqli_real_escape_string($connect, $_GET['id']) : "";
$quality = isset($_GET['service']) ? mysqli_real_escape_string($connect, $_GET['service']) : "basic";
try {
    $eventStartTime = isset($_GET['eventStartTime']) ? mysqli_real_escape_string($connect, $_GET['eventStartTime']) : new DateTime();
    $eventStartTime->format('Y-m-d H:i:s');
} catch (Exception $e) {
}
$eventLocation = isset($_GET['eventLocation']) ? mysqli_real_escape_string($connect, $_GET['eventLocation']) : "";
if (isset($_GET['productPrice'])) {
    $price = mysqli_real_escape_string($connect, $_GET['productPrice']);
} else {
    $sql = "SELECT price FROM event WHERE event_ID = {$product_id}";
    $price = db_select($sql)[0]['price'];
}

$sql = "SELECT eventStartTime
FROM cart
WHERE event_ID = {$product_id} 
AND user_ID = {$userID}
AND quality = '{$quality}'
";
$startTimes = db_select($sql);

if (sizeof($startTimes) === 0) {
    $eventStartTimeText = $eventStartTime->format('Y-m-d H:i:s');
    $sql = "INSERT INTO cart (user_ID, event_ID, quantity, quality, eventStartTime, eventLocation, price) VALUES ({$userID}, {$product_id}, 1, '{$quality}', '{$eventStartTimeText}', '{$eventLocation}', {$price})";
    $result = db_query($sql);
    header("location:../../{$previousURL}.php?addtocart=success");
} elseif (sizeof($startTimes) > 0) {
    $sql = "SELECT event.event_type
    FROM event
    WHERE event_ID = {$product_id}
    ";
    $result = db_select($sql);
    switch ($result[0]['event_type']) {
        case "entertainment":
            $sql = "SELECT duration FROM entertainmentpackage WHERE event_ID = {$product_id}";
            $duration = db_select($sql)[0]['duration'];
            $startTime = $eventStartTime->modify('-' . $duration . '6 hours')->format('Y-m-d H:i:s');
            $endTime = $eventStartTime->modify('+' . $duration . '6 hours')->format('Y-m-d H:i:s');
            $sql = "SELECT orderdetail_ID
                FROM orderdetail
                WHERE event_ID = {$product_id}
                AND event_startTime BETWEEN '{$startTime}' AND '{$endTime}'
            ";
            $orderCount = db_select($sql);
            $sql = "SELECT quantity
            FROM cart
            WHERE event_ID = {$product_id}
            AND eventStartTime BETWEEN '{$startTime}' AND '{$endTime}'
            ";
            $cartCount = db_select($sql);
            if (sizeof($orderCount) > 0 || sizeof($cartCount) > 0) {
                header("location: ../../{$previousURL}.php?addtocart=overlappedBooking");
            } else {
                $eventStartTimeText = $eventStartTime->format('Y-m-d H:i:s');
                $sql = "INSERT INTO cart (user_ID, event_ID, quantity, quality, eventStartTime, eventLocation, price) VALUES ({$userID}, {$product_id}, 1, '{$quality}', '{$eventStartTimeText}', '{$eventLocation}', {$price})";
                $result = db_query($sql);
                header("location:../../{$previousURL}.php?addtocart=success");
            }
            break;
        case "menu":
            $sql = "SELECT duration FROM menu WHERE event_ID = {$product_id}";
            break;
        case "venue":
            $sql = "SELECT address, capacity, region FROM venue WHERE event_ID = {$product_id}";
            break;
    }
} else {
    header("location: ../../{$previousURL}.php?addtocart=failed");
}



