<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';

$connect = db_connect();
$methodID = $_POST['methodID'];

if ($methodID == 1){
    $voucher_code = $_POST['voucher_code'];
    $sql = "SELECT * FROM voucher WHERE voucher_code = '$voucher_code'";
    $resultset = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($resultset);

   if($count === 0){
        echo 0;
    }
    else{
        $result = mysqli_fetch_array($resultset);
        $discount = $result["discount"];
        echo $discount;
    }
};
