<?php
function db_connect()
{
    static $connection;

    if (!isset($connection)) {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
        $connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbName']);
    }
    db_validate();
    return $connection;
}

function db_close($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

function db_validate()
{
    if (mysqli_connect_errno()) {
        $msg = "Error: Unable to connect to MySQL";
        $msg .= mysqli_connect_errno();
        $msg .= mysqli_connect_error();
        exit($msg);
    }
}

function db_query($query)
{
    $connection = db_connect();
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $result;
}

function db_select($query)
{
    $rows = array();
    $result = db_query($query);

    if ($result === false) {
        db_error();
        return false;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function db_error()
{
    $connection = db_connect();
    return mysqli_error($connection);
}

