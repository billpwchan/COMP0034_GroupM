<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/displayCart.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';

$connect = db_connect();
$methodID = $_POST['methodID'];
$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);

if ($methodID == 1) {
    $item_id = mysqli_real_escape_string($connect, $_POST['item_id']);
    $sql = "DELETE FROM cart WHERE cart_ID = $item_id and user_ID = $userID";
    db_query($sql);
}

if ($methodID == 2) {
    $discount = $_POST['discount'];
    $totalPrice = 0.0;
    $item_prices = array();
    foreach ($_SESSION['cartItems'] as $key => $cartItem) {
        $cartItem['price'] = $cartItem['price'] * (1 - ($discount / 100));
        $updated_price = $cartItem['price'];
        $item_prices[$key] = $cartItem['price'];
        $totalPrice += (float)$cartItem['price'];
    }
    echo json_encode($item_prices);
}
