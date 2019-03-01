<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 27/2/2019
 * Time: 3:12
 */

require_once "dbController.php";

class auth
{

    function getTokenByEmail($email, $expired)
    {
        $db_handle = new dbController();
        $query = "Select * from loginauth where email = ? and is_expired = ?";
        $result = $db_handle->db_query($query, 'si', array($email, $expired));
        return $result;
    }

    function markAsExpired($tokenId)
    {
        $db_handle = new dbController();
        $query = "UPDATE loginauth SET is_expired = ? WHERE id = ?";
        $expired = 1;
        $result = $db_handle->db_update($query, 'ii', array($expired, $tokenId));
        return $result;
    }

    function insertToken($email, $random_password_hash, $random_selector_hash, $expiry_date)
    {
        $db_handle = new dbController();
        $query = "INSERT INTO loginauth (email, password_hash, selector_hash, expiry_date) values (?, ?, ?,?)";
        $result = $db_handle->db_insert($query, 'ssss', array($email, $random_password_hash, $random_selector_hash, $expiry_date));
        return $result;
    }

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