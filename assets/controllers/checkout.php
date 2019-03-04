<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/order.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/cart.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/customer.php';

$customer = new customer();
$order = new order();
$cart = new cart();

if (!isset($_SESSION['userInfo'])) {
    header("location:../../login.php");
}

$userID = $_SESSION['userInfo']['user_ID'];

$totalPrice = 0.0;
foreach ($_SESSION['cartItems'] as $cartItem) {
    $totalPrice += (float)$cartItem['price'];
}

$balance = (float)$customer->getBalance($userID);
if ($totalPrice > $balance) {
    header("Location:../../shoppingCart.php?status=insufficientBalance");
}

$orderID = $order->insertNewOrder($userID);

foreach ($_SESSION['cartItems'] as $cartItem) {
    $event_ID = $cartItem['event_ID'];
    $quality = $cartItem['quality'];
    $event_startTime = $cartItem['eventStartTime'];
    $event_location = $cartItem['eventLocation'];
    $price = $cartItem['price'];
    $status = "Pending";
    $order->insertNewOrderHistory($orderID, $event_ID, $quality, $event_startTime, $event_location, $price, $status);
}

unset($_SESSION['cartItems']);
$cart->removeCart($userID);
$balance -= $totalPrice;

$customer->updateBalance($balance, $userID);
header("Location:../../shoppingCart.php?status=success");