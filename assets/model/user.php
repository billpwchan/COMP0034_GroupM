<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

require_once "dbController.php";
require_once "mail.php";

/**
 * Class user
 */
class user
{
    /**
     * @param $firstName
     * @param $lastName
     * @param $gender
     * @param $email
     * @param $password
     * @param $contactNumber
     * @param $avatar
     * @param $accountType
     * @return bool
     */
    function register($firstName, $lastName, $gender, $email, $password, $contactNumber, $avatar, $accountType)
    {
        $db_handle = new dbController();
        if (!$this->checkUserExistsByEmail($email)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $registrationDate = date('Y-m-d H:i:s');
            $email_activation_key = md5($email . $firstName . $lastName);

            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/assets/uploads/avatar/";
            $fileName = $avatar['name'];
            $fileTmpName = $avatar['tmp_name'];
            $uploadPath = $uploadDirectory . basename($fileName);

            move_uploaded_file($fileTmpName, $uploadPath);

            $sql = "
            INSERT INTO user (first_name, last_name, gender, email_address, password, contact_number, registration_date, avatar, status, email_activation_key) 
            VALUES (?,?,?,?,?,?,?,?,0,?)";
            $db_handle->db_insert($sql, 'sssssssss', array($firstName, $lastName, $gender, $email, $password, $contactNumber, $registrationDate, $fileName, $email_activation_key));
            $autoGenID = $db_handle->db_lastID();
            if (strtolower($accountType) == "customer") {
                $sql = "INSERT INTO customer (user_ID, account_balance) VALUES (?, 2000.00)";
                $db_handle->db_query($sql, 'i', array($autoGenID));
            } else if (strtolower($accountType) == "service provider") {
                $companyName = 'UberKidz Company';
                $sql = "INSERT INTO servicesupplier (user_ID, company_name) VALUES (?, ?)";
                $db_handle->db_query($sql, 'is', array($autoGenID, $companyName));
            }
            $mail = new mail();
            $mail->emailActivation('Verify Your Email Address', $email, $firstName, $email_activation_key);
            return true;
        }
        return false;
    }

    /**
     * @param $email
     * @return bool
     */
    private function checkUserExistsByEmail($email)
    {
        $db_handle = new dbController();
        $sql = "select email_address from user WHERE email_address = ?";
        return sizeof($db_handle->db_query($sql, 's', array($email))) === 1;
    }

    /**
     * @param $key
     * @return bool
     */
    public function activateAccount($key)
    {
        $db_handle = new dbController();
        $sql = "UPDATE user SET status = 1, email_activation_key = '' WHERE email_activation_key = ?";
        return $db_handle->db_update($sql, 's', array($key));
    }

    /**
     * @param $email
     * @return array
     */
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

    /**
     * @param $password
     * @param $email
     * @return bool
     */
    function updatePassword($password, $email)
    {
        $db_handle = new dbController();
        $sql = "UPDATE user SET password = ? WHERE email_address = ?";
        return $db_handle->db_update($sql, 'ss', array($password, $email));
    }

    /**
     * @param $firstName
     * @param $userID
     */
    function updateFirstName($firstName, $userID)
    {
        $db_handle = new dbController();
        $sql = "UPDATE user SET first_name = ? WHERE user_ID = ?";
        $db_handle->db_update($sql, 'si', array($firstName, $userID));
    }

    /**
     * @param $lastName
     * @param $userID
     */
    function updateLastName($lastName, $userID)
    {
        $db_handle = new dbController();
        $sql = "UPDATE user SET last_name = ? WHERE user_ID = ?";
        $db_handle->db_update($sql, 'si', array($lastName, $userID));
    }

    /**
     * @param $phone
     * @param $userID
     */
    function updatePhone($phone, $userID)
    {
        $db_handle = new dbController();
        $sql = "UPDATE user SET contact_number = ? WHERE user_ID = ?";
        $db_handle->db_update($sql, 'si', array($phone, $userID));
    }
}