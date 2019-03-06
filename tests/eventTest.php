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
 * Date: 4/3/2019
 * Time: 16:45
 */

use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../vendor/autoload.php";
require_once('../assets/model/event.php');

class eventTest extends TestCase
{
    use TestCaseTrait;

    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo;

    // only instantiate PHPUnit\DbUnit\Database\Connection once per test
    private $conn = null;

    public function setUp()
    {
        $_SERVER['DOCUMENT_ROOT'] = "../";
    }

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
//                self::$pdo = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
                self::$pdo = new PDO("mysql:dbname=uberkidz;host=localhost", "root", "");
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, "uberkidz");
        }
        return $this->conn;
    }

    public function getDataSet()
    {
        return $this->createFlatXmlDataSet('event_fixture.xml');
    }


}
