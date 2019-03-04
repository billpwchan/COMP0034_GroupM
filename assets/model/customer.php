<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 4/3/2019
 * Time: 16:59
 */

require_once "dbController.php";

class customer
{

    function getBalance($userID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT account_balance
        FROM customer
        WHERE user_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($userID))[0]['account_balance'];
    }

    function updateBalance($balance, $userID)
    {
        $db_handle = new dbController();
        $sql = "UPDATE customer SET account_balance = ? WHERE user_ID = ?";
        return $db_handle->db_update($sql, 'di', array($balance, $userID));
    }

    function customer_read($userID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT customer.user_ID, account_balance, description, facebook, twitter, pinterest, tumblr
        FROM user, customer
        WHERE user.user_ID = customer.user_ID
        AND user.user_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($userID));
    }

    function customer_order_history($userID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.name as 'Event Name', event.event_type as 'Type', event_startTime as 'Start Time', event_location as 'Location', orderdetail.price as 'Price', status as 'Status'
        FROM customer, orderhistory, orderdetail, event
        WHERE customer.user_ID = orderhistory.customer_ID
        AND orderhistory.order_ID = orderdetail.order_ID
        AND orderdetail.event_ID = event.event_ID
        AND customer.user_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($userID));
    }

}