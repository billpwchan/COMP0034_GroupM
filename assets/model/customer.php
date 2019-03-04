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
}