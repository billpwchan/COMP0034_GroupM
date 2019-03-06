<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 4/3/2019
 * Time: 17:02
 */

require_once "dbController.php";

class order
{
    function insertNewOrder($userID)
    {
        $db_handle = new dbController();
        $sql = "INSERT INTO orderhistory (customer_ID) VALUES (?)";
        $db_handle->db_insert($sql, 'i', array($userID));
        return $db_handle->db_lastID();
    }

    function insertNewOrderHistory($orderHistoryID, $event_ID, $quality, $event_startTime, $event_location, $price, $status)
    {
        $db_handle = new dbController();
        $sql = "INSERT INTO orderdetail (order_ID, event_ID, quality, event_startTime, event_location, price, status) VALUES (?,?,?,?,?,?,?)";
        return $db_handle->db_insert($sql, 'iisssds', array($orderHistoryID, $event_ID, $quality, $event_startTime, $event_location, $price, $status));
    }
}