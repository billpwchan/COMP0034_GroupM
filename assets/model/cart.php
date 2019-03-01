<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 28/2/2019
 * Time: 22:12
 */

require_once "dbController.php";

class cart
{
    public function __construct()
    {

    }

    public function displayCart($userID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.eventimage1, event.name, event.event_type, cart.price, cart.quantity, cart.quality, cart.eventStartTime, cart.eventLocation, cart.cart_ID
        FROM cart, event
        WHERE cart.event_ID = event.event_ID
        AND cart.user_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($userID));
    }

    public function applyCoupon($voucher_code)
    {
        $db_handle = new dbController();
        $sql = "SELECT * FROM voucher WHERE voucher_code = ?";
        return $db_handle->db_query($sql, 's', array($voucher_code));
    }
}