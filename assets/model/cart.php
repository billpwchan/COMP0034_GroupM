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

    public function applyCoupon($voucher_code)
    {
        $db_handle = new dbController();
        $sql = "SELECT * FROM voucher WHERE voucher_code = ?";
        return $db_handle->db_query($sql, 's', array($voucher_code));
    }
}