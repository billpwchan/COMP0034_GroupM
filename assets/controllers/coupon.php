<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/cart.php';

$cart = new cart();
$methodID = $_POST['methodID'];

if ($methodID == 1) {
    $result = $cart->applyCoupon($_POST['voucher_code']);

    if (sizeof($result) === 0) {
        echo 0;
    } else {
        $discount = $result[0]["discount"];
        $_SESSION['discount'] = $discount;
    }
};
