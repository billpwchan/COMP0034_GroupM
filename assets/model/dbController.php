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
 * Time: 1:33
 */

class dbController
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;


    /**
     * dbController constructor.
     */
    function __construct()
    {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['dbName'];
        $this->conn = $this->connectDB();
    }

    /**
     * @return mysqli
     */
    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    /**
     * @param $query
     * @return array
     */
    function runBaseQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }


    /**
     * @param $query
     * @param $param_type
     * @param $param_value_array
     * @return array
     */
    function db_query($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }

        if (!empty($resultset)) {
            return $resultset;
        }
        return array();
    }

    /**
     * @param $sql
     * @param $param_type
     * @param $param_value_array
     */
    function bindQueryParams($sql, $param_type, $param_value_array)
    {
        $param_value_reference[] = &$param_type;
        for ($i = 0; $i < count($param_value_array); $i++) {
            $param_value_reference[] = &$param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }

    /**
     * @param $query
     * @param $param_type
     * @param $param_value_array
     * @return bool
     */
    function db_insert($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        return $sql->execute();
    }

    /**
     * @param $query
     * @param $param_type
     * @param $param_value_array
     * @return bool
     */
    function db_update($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        return $sql->execute();
    }

    /**
     * @return int|string
     */
    function db_lastID()
    {
        return mysqli_insert_id($this->conn);
    }
}