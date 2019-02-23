<?php
if (!isset($_SESSION['userInfo'])) {
    header("Location" . $_SERVER['DOCUMENT_ROOT'] . "/login.php");
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);
$sql = "
        SELECT event.event_ID, event.eventimage1, event.name, event.event_type, cart.price, cart.quantity, cart.quality, cart.eventStartTime, cart.eventLocation
        FROM cart, event
        WHERE cart.event_ID = event.event_ID
        AND cart.user_ID = $userID
";
$_SESSION['cartItems'] = db_select($sql);