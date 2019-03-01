<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 28/2/2019
 * Time: 22:25
 */
require_once "dbController.php";


class contact
{

    /**
     * contact constructor.
     */
    public function __construct()
    {
    }

    public function storeMessage($name, $email, $message)
    {
        $db_handle = new dbController();
        $sql = "INSERT INTO message(name, email, message) VALUES (?,?,?)";
        return $db_handle->db_insert($sql, 'sss', array($name, $email, $message));
    }
}