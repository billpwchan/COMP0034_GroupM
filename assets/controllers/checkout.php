<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

if (!isset($_SESSION['userInfo'])) {
    header("location:../../login.php");
}

$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);

$totalPrice = 0.0;
foreach ($_SESSION['cartItems'] as $cartItem) {
    $totalPrice += (float)$cartItem['price'];
}
$sql = "
    SELECT account_balance
    FROM customer
    WHERE user_ID = $userID
";
$balance = (float)db_select($sql)[0]['account_balance'];
if ($totalPrice > $balance) {
    header("Location:../../shoppingCart.php?status=insufficientBalance");
}

foreach ($_SESSION['cartItems'] as $cartItem) {
    $event_ID = mysqli_real_escape_string($connect, $cartItem['event_ID']);
    $quality = mysqli_real_escape_string($connect, $cartItem['quality']);
    $event_startTime = mysqli_real_escape_string($connect, $cartItem['eventStartTime']);
    $event_location = mysqli_real_escape_string($connect, $cartItem['eventLocation']);
    $price = mysqli_real_escape_string($connect, $cartItem['price']);
    $status = "Pending";
    $sql = "
        INSERT INTO orderdetail (event_ID, quality, event_startTime, event_location, price, status) 
        VALUES ($event_ID, '$quality', '$event_startTime', '$event_location', $price, '$status')
    ";
    $result = db_query($sql);
    $orderDeatilID = mysqli_insert_id($connect);
    $sql = "
        INSERT INTO orderhistory (customer_ID, orderdetail_ID)
        VALUES ($userID, $orderDeatilID);
    ";
    $result = db_query($sql);
}

unset($_SESSION['cartItems']);
$sql = "
    DELETE FROM cart WHERE user_ID = $userID;
";
$result = db_query($sql);
$balance -= $totalPrice;

$sql = "UPDATE customer SET account_balance = $balance WHERE user_ID = $userID";
$result = db_query($sql);
header("Location:../../shoppingCart.php?status=success");