<?php

if (!isset($_SESSION['userInfo'])) {
    header("Location:../../login.php");
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
$connect = db_connect();
session_start();
$previousURL = $_GET['from'];
$userID = mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);
$product_id = isset($_GET['id']) ? mysqli_real_escape_string($connect, $_GET['id']) : "";

$sql = "SELECT quantity FROM cart WHERE event_ID = {$product_id} AND user_ID = {$userID}";
$result = db_select($sql);

if (sizeof($result) === 0) {
    $sql = "INSERT INTO cart (user_ID, event_ID, quantity) VALUES ({$userID}, {$product_id}, 1)";
    $result = db_query($sql);
} else {
    $quantity = (int)$result[0]['quantity'];
    $quantity = $quantity + 1;
    $sql = "UPDATE cart
            SET user_ID = $userID, event_ID = $product_id, quantity = $quantity
            WHERE event_ID = $product_id and user_ID = $userID";
    $result = db_query($sql);
    if ($result) {
        header("location:../../{$previousURL}.php?addtocart=success");
    }
}

