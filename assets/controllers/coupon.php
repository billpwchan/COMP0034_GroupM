<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';

$connect = db_connect();
$methodID = $_POST['methodID'];

if ($methodID == 1) {
    $voucher_code = mysqli_real_escape_string($connect, $_POST['voucher_code']);
    $sql = "SELECT * FROM voucher WHERE voucher_code = '{$voucher_code}'";
    $result = db_select($sql);


    if (sizeof($result) === 0) {
        echo 0;
    } else {
        $discount = $result[0]["discount"];
        echo $discount;
    }
};
