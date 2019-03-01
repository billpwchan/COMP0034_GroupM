<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 28/2/2019
 * Time: 22:12
 */

require_once "dbController.php";

/**
 * Class cart
 */
class cart
{

    /**
     * cart constructor.
     */
    public function __construct()
    {

    }

    public function insertCart($userID, $productID, $quality, $eventStartTime, $eventLocation, $price)
    {
        $db_handle = new dbController();
        $sql = "INSERT INTO 
          cart (user_ID, event_ID, quantity, quality, eventStartTime, eventLocation, price) 
          VALUES (?, ?, 1, ?, ?, ?, ?)
          ";
        return $db_handle->db_update($sql, 'iisssd', array($userID, $productID, $quality, $eventStartTime, $eventLocation, $price));
    }

    function checkOverlapBookingCart($productID, $startTime, $endTime)
    {
        $db_handle = new dbController();
        $sql = "SELECT quantity
                FROM cart
                WHERE event_ID = ?
                AND eventStartTime BETWEEN ? AND ?
            ";
        return $db_handle->db_query($sql, 'iss', array($productID, $startTime, $endTime));
    }

    /**
     * @param $userID
     * @return array
     */
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

    /**
     * @param $voucher_code
     * @return array
     */
    public function applyCoupon($voucher_code)
    {
        $db_handle = new dbController();
        $sql = "SELECT * FROM voucher WHERE voucher_code = ?";
        return $db_handle->db_query($sql, 's', array($voucher_code));
    }
}