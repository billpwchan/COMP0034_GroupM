<?php
if (!isset($_SESSION['userInfo'])) {
    header("Location" . $_SERVER['DOCUMENT_ROOT'] . "/login.php");
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
$connect = db_connect();
if (!isset($_SESSION)) {
    session_start();
}
$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);
$sql = "
        SELECT event.eventimage1, event.name, cart.price, cart.quantity, cart.quality
        FROM cart, event
        WHERE cart.event_ID = event.event_ID
        AND cart.user_ID = $userID
";
$_SESSION['cartItems'] = db_select($sql);