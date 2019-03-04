<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/customer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/serviceProvider.php';

$customer = new customer();
$serviceProvider = new serviceProvider();

if (!isset($_SESSION['userInfo']) && empty($_SESSION['userInfo'])) {
    session_unset();
    header('location:index.php');
}

$userID = $_SESSION['userInfo']['user_ID'];
$result = $customer->customer_read($userID);
if (sizeof($result) === 1) {
    //This is a customer account
    $_SESSION['customer'] = $result[0];
    $orderHistory = $customer->customer_order_history($userID);
} else {
    $result = $serviceProvider->service_provider_read($userID);
    if (sizeof($result) === 1) {
        //This is a service provider account
        $_SESSION['service_provider'] = $result[0];
        $providedServices = $serviceProvider->provider_provided_service($userID);
    }
}
