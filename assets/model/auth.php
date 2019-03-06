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
 * Date: 27/2/2019
 * Time: 3:12
 */

require_once "dbController.php";

/**
 * Class auth
 */
class auth
{

    /**
     * @param $selector
     * @param $time
     * @return array
     */
    public function checkResetExpiry($selector, $time)
    {
        $db_handle = new dbController();
        $sql = "SELECT * FROM passwordreset WHERE selector = ? AND expires >= ?";
        return $db_handle->db_query($sql, 'si', array($selector, $time));
    }

    public function insertResetLink($email, $selector, $token, $expires)
    {
        $db_handle = new dbController();
        $sql = "INSERT INTO passwordreset (email, selector, token, expires) VALUES (?,?,?,?)";
        return $db_handle->db_update($sql, 'sssi', array($email, $selector, $token, $expires));
    }

    public function selectNameByEmail($email)
    {
        $db_handle = new dbController();
        $sql = "SELECT first_name
        FROM user, passwordreset
        WHERE user.email_address = passwordreset.email
        AND passwordreset.email = ?";
        return $db_handle->db_query($sql, 's', array($email));
    }

    /**
     * @param $email
     * @return array
     */
    public function clearResetLink($email)
    {
        $db_handle = new dbController();
        $sql = "DELETE FROM passwordreset WHERE email = ?";
        return $db_handle->db_query($sql, 's', array($email));
    }

    /**
     * @param $email
     * @param $expired
     * @return array
     */
    function getTokenByEmail($email, $expired)
    {
        $db_handle = new dbController();
        $query = "Select * from loginauth where email = ? and is_expired = ?";
        $result = $db_handle->db_query($query, 'si', array($email, $expired));
        return $result;
    }

    /**
     * @param $tokenId
     * @return bool
     */
    function markAsExpired($tokenId)
    {
        $db_handle = new dbController();
        $query = "UPDATE loginauth SET is_expired = ? WHERE id = ?";
        $expired = 1;
        $result = $db_handle->db_update($query, 'ii', array($expired, $tokenId));
        return $result;
    }

    /**
     * @param $email
     * @param $random_password_hash
     * @param $random_selector_hash
     * @param $expiry_date
     * @return bool
     */
    function insertToken($email, $random_password_hash, $random_selector_hash, $expiry_date)
    {
        $db_handle = new dbController();
        $query = "INSERT INTO loginauth (email, password_hash, selector_hash, expiry_date) values (?, ?, ?,?)";
        $result = $db_handle->db_insert($query, 'ssss', array($email, $random_password_hash, $random_selector_hash, $expiry_date));
        return $result;
    }

    /**
     * @param $length
     * @return string
     */
    public function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->cryptoRandSecure(0, $max)];
        }
        return $token;
    }

    /**
     * @param $min
     * @param $max
     * @return int
     */
    public function cryptoRandSecure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) {
            return $min; // not so random...
        }
        $log = ceil(log($range, 2));
        $bytes = (int)($log / 8) + 1; // length in bytes
        $bits = (int)$log + 1; // length in bits
        $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    /**
     *
     */
    public function clearCookies()
    {
        if (isset($_COOKIE["member_login"])) {
            setcookie("member_login", "");
        }
        if (isset($_COOKIE["random_password"])) {
            setcookie("random_password", "");
        }
        if (isset($_COOKIE["random_selector"])) {
            setcookie("random_selector", "");
        }
    }
}

?>