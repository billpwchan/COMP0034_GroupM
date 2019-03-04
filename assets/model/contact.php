<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 28/2/2019
 * Time: 22:25
 */
require_once "dbController.php";


/**
 * Class contact
 */
class contact
{


    /**
     * @param $name
     * @param $email
     * @param $message
     * @return bool
     */
    public function storeMessage($name, $email, $message)
    {
        $db_handle = new dbController();
        $sql = "INSERT INTO message(name, email, message) VALUES (?,?,?)";
        return $db_handle->db_insert($sql, 'sss', array($name, $email, $message));
    }
}