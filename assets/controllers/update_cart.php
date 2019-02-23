<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/displayCart.php';
//include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/navigation.php';

$connect = db_connect();
$methodID = $_POST['methodID'];
$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);

if ($methodID == 1){
    $item_id = $_POST['item_id'];
    $sql = "DELETE FROM cart WHERE user_ID = $userID && event_ID = 2";
    db_query($sql);
}

if ($methodID == 2){
    $discount = $_POST['discount'];
    $totalPrice = 0.0;
    $item_prices = array();
    foreach ($_SESSION['cartItems'] as $key => $cartItem){
        $cartItem['price'] = $cartItem['price'] * (1 - ($discount/100));
        $item_prices[$key] = $cartItem['price'];
        $totalPrice += (float)$cartItem['price'];
    }
    $sql = "UPDATE user SET contact_number = '$new_contact_number' WHERE user_ID = $userID";
        echo json_encode($item_prices);
}
