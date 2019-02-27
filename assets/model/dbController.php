<?php
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


    function __construct()
    {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['dbName'];
        $this->conn = $this->connectDB();
    }

    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    function runBaseQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }


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

    function db_insert($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        return $sql->execute();
    }

    function db_update($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        return $sql->execute();
    }

    function db_lastID()
    {
        return mysqli_insert_id($this->conn);
    }
}