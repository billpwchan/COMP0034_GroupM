<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

if (!isset($_SESSION['userInfo']) && empty($_SESSION['userInfo'])) {
    session_unset();
    header('location:index.php');
}

$userID = (int)mysqli_real_escape_string($connect, $_SESSION['userInfo']['user_ID']);
$result = customer_read($userID);
if (sizeof($result) === 1) {
    //This is a customer account
    $_SESSION['customer'] = $result[0];
    $orderHistory = customer_order_history($userID);
} else {
    $result = service_provider_read($userID);
    if (sizeof($result) === 1) {
        //This is a service provider account
        $_SESSION['service_provider'] = $result[0];
        $providedServices = provider_provided_service($userID);
    }
}

function customer_read($userID)
{
    $sql = "
    SELECT customer.user_ID, account_balance, description, facebook, twitter, pinterest, tumblr
    FROM user, customer
    WHERE user.user_ID = customer.user_ID
    AND user.user_ID = {$userID}
    ";
    return db_select($sql);
}

function service_provider_read($userID)
{
    $sql = "
    SELECT servicesupplier.user_ID, company_name
    FROM user, servicesupplier
    WHERE user.user_ID = servicesupplier.user_ID
    AND user.user_ID = {$userID}
    ";
    return db_select($sql);
}

function customer_order_history($userID)
{
    $sql = "
    SELECT event.name as 'Event Name', event.event_type as 'Type', event_startTime as 'Start Time', event_location as 'Location', orderdetail.price as 'Price', status as 'Status'
    FROM customer, orderhistory, orderdetail, event
    WHERE customer.user_ID = orderhistory.customer_ID
    AND orderhistory.order_ID = orderdetail.order_ID
    AND orderdetail.event_ID = event.event_ID
    AND customer.user_ID = {$userID}
    ";
    return db_select($sql);
}

function provider_provided_service($userID)
{
    $sql = "
    SELECT event.name as 'Event Name', event.event_type as 'Type', event.price as 'Price', event.created as 'Created Time'
    FROM servicesupplier, event
    WHERE servicesupplier.user_ID = event.provider_ID
    AND servicesupplier.user_ID = {$userID}
    ";
    return db_select($sql);
}