<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/displayCart.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/cart.php';
$cart = new cart();

$methodID = $_POST['methodID'];
$userID = $_SESSION['userInfo']['user_ID'];

if ($methodID == 1) {
    $item_id = $_POST['item_id'];
    $cart->removeCartByCartID($userID, $item_id);
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
