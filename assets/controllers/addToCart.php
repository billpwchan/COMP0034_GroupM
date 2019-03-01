<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/event.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/cart.php';
$connect = db_connect();
$event = new event();
$cart = new cart();

$previousURL = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($_GET['from']))))));

if (!isset($_SESSION['userInfo'])) {
    header("location:../../login.php");
}

// Initialize Variables
$userID = $_SESSION['userInfo']['user_ID'];
$product_id = isset($_GET['id']) ? $_GET['id'] : "";
$quality = isset($_GET['service']) ? $_GET['service'] : "basic";
try {
    $eventStartTime = new DateTime();
    if (isset($_GET['eventStartTime'])) {
        $eventStartTime->setTimestamp(strtotime($_GET['eventStartTime']));
    }
} catch (Exception $e) {
}
$eventLocation = isset($_GET['eventLocation']) ? $_GET['eventLocation'] : "";
if (isset($_GET['productPrice'])) {
    $price = $_GET['productPrice'];
} else {
    $price = $event->getEventPrice($product_id);
}
$productType = $event->getEventType($product_id);

switch ($productType) {
    case "entertainment":
        $duration = $event->selectDuration('entertainment', $product_id);
        $startTime = $eventStartTime->modify('-' . $duration . ' hours')->format('Y-m-d H:i:s');
        $endTime = $eventStartTime->modify('+' . $duration . ' hours')->format('Y-m-d H:i:s');
        $orderCount = $event->checkOverlapBookingOrderDetail($product_id, $startTime, $endTime);
        $cartCount = $cart->checkOverlapBookingCart($product_id, $startTime, $endTime);
        if (sizeof($orderCount) > 0) {
            print_r($orderCount);
            header("location: ../../{$previousURL}.php?addtocart=overlappedBooking");
            exit();
        } elseif (sizeof($cartCount) > 0) {
            header("location: ../../{$previousURL}.php?addtocart=duplicateInCart");
            exit();
        } else {
            $eventStartTimeText = $eventStartTime->format('Y-m-d H:i:s');
            $updateFlag = $cart->insertCart($userID, $product_id, $quality, $eventStartTimeText, $eventLocation, $price);
            if ($updateFlag) {
                header("location:../../{$previousURL}.php?addtocart=success");
                exit();
            }
        }
        break;
    case "menu":
        $duration = $event->selectDuration('menu', $product_id);
        $startTime = $eventStartTime->modify('-' . $duration . ' hours')->format('Y-m-d H:i:s');
        $endTime = $eventStartTime->modify('+' . $duration . ' hours')->format('Y-m-d H:i:s');
        $orderCount = $event->checkOverlapBookingOrderDetail($product_id, $startTime, $endTime);
        $cartCount = $cart->checkOverlapBookingCart($product_id, $startTime, $endTime);
        if (sizeof($orderCount) > 0) {
            print_r($orderCount);
            header("location: ../../{$previousURL}.php?addtocart=overlappedBooking");
            exit();
        } elseif (sizeof($cartCount) > 0) {
            header("location: ../../{$previousURL}.php?addtocart=duplicateInCart");
            exit();
        } else {
            $eventStartTimeText = $eventStartTime->format('Y-m-d H:i:s');
            $updateFlag = $cart->insertCart($userID, $product_id, $quality, $eventStartTimeText, $eventLocation, $price);
            if ($updateFlag) {
                header("location:../../{$previousURL}.php?addtocart=success");
                exit();
            }
        }
        break;
    case "venue":
        $duration = $event->selectDuration('menu', $product_id);
        $startTime = $eventStartTime->modify('-8 hours')->format('Y-m-d H:i:s');
        $endTime = $eventStartTime->modify('+8 hours')->format('Y-m-d H:i:s');
        $orderCount = $event->checkOverlapBookingOrderDetail($product_id, $startTime, $endTime);
        $cartCount = $cart->checkOverlapBookingCart($product_id, $startTime, $endTime);
        if (sizeof($orderCount) > 0) {
            print_r($orderCount);
            header("location: ../../{$previousURL}.php?addtocart=overlappedBooking");
            exit();
        } elseif (sizeof($cartCount) > 0) {
            header("location: ../../{$previousURL}.php?addtocart=duplicateInCart");
            exit();
        } else {
            $eventStartTimeText = $eventStartTime->format('Y-m-d H:i:s');
            $updateFlag = $cart->insertCart($userID, $product_id, $quality, $eventStartTimeText, $eventLocation, $price);
            if ($updateFlag) {
                header("location:../../{$previousURL}.php?addtocart=success");
                exit();
            }
        }
        break;
}