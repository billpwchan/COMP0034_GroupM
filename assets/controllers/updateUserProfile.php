<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';


$connect = db_connect();
$methodID = $_POST['methodID'];

if ($methodID == 1){
    $new_first_name = $_POST['new_first_name'];
    $sql = "UPDATE user SET first_name = '$new_first_name' WHERE user_ID = 18";
    mysqli_query($connect, $sql);
};
if ($methodID == 2){
    $new_last_name = $_POST['new_last_name'];
    $sql = "UPDATE user SET last_name = '$new_last_name' WHERE user_ID = 18";
    mysqli_query($connect, $sql);
};

if ($methodID == 3){
    $new_password = md5($_POST['new_password']);
    $sql = "UPDATE user SET password = '$new_password' WHERE user_ID = 18";
    mysqli_query($connect, $sql);
};

if ($methodID == 4){
    $new_contact_number = $_POST['new_contact_number'];
    $sql = "UPDATE user SET contact_number = '$new_contact_number' WHERE user_ID = 18";
    mysqli_query($connect, $sql);
};

