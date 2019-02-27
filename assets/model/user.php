<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 27/2/2019
 * Time: 1:48
 */
require_once "DBController.php";

class user
{
    function selectUserByEmail($email)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT user_ID, first_name, last_name, gender, email_address, password, contact_number, registration_date, avatar, status
        FROM user
        WHERE email_address = ?
        ";
        return $db_handle->db_query($sql, 's', array($email));
    }
}