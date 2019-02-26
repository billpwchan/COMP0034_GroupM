<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/displayCart.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';

$connect = db_connect();
$methodID = $_POST['methodID'];
$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);

if ($methodID == 1){
    $item_id = $_POST['item_id'];
    $sql1 = "SELECT cart_ID FROM cart WHERE user_ID = $userID LIMIT $item_id, 1";
    $resultset = mysqli_query($connect, $sql1);
    $result = mysqli_fetch_array($resultset);
    $primary_key = $result['cart_ID'];

    $sql2 = "DELETE FROM cart WHERE cart_ID = $primary_key";
    db_query($sql2);
}

if ($methodID == 2){
    $discount = $_POST['discount'];
    $totalPrice = 0.0;
    $item_prices = array();
    foreach ($_SESSION['cartItems'] as $key => $cartItem){
        $cartItem['price'] = $cartItem['price'] * (1 - ($discount/100));
        $updated_price = $cartItem['price'];
        $item_prices[$key] = $cartItem['price'];
        $totalPrice += (float)$cartItem['price'];
    }
    echo json_encode($item_prices);
}
