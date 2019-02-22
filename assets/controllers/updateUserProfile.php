<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';

$connect = db_connect();
$methodID = $_POST['methodID'];
$userID = $_SESSION['userInfo']['user_ID'];

if ($methodID == 1) {
    $new_first_name = mysqli_real_escape_string($connect, $_POST['new_first_name']);
    $sql = "UPDATE user SET first_name = '$new_first_name' WHERE user_ID = $userID";
    db_query($sql);
};
if ($methodID == 2) {
    $new_last_name = mysqli_real_escape_string($connect, $_POST['new_last_name']);
    $sql = "UPDATE user SET last_name = '$new_last_name' WHERE user_ID = $userID";
    db_query($sql);
};

if ($methodID == 3) {
    $new_password = md5($_POST['new_password']);
    $sql = "UPDATE user SET password = '$new_password' WHERE user_ID = $userID";
    db_query($sql);
};

if ($methodID == 4) {
    $new_contact_number = mysqli_real_escape_string($connect, $_POST['new_contact_number']);
    $sql = "UPDATE user SET contact_number = '$new_contact_number' WHERE user_ID = $userID";
    db_query($sql);
};

