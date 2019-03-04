<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 28/2/2019
 * Time: 22:35
 */

use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../vendor/autoload.php";
require_once('../assets/model/contact.php');

class contactTest extends TestCase
{
    use TestCaseTrait;

    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

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

    public function teardown()
    {
    }

    public function getDataSet()
    {
        return $this->createFlatXmlDataSet('message_fixture.xml');
    }

    public function testRowCount()
    {
        $this->assertSame(1, $this->getConnection()->getRowCount('message'), "Pre-Condition");
    }

    public function testStoreMessage()
    {
        $contact = new contact();
        $contact->storeMessage('tom', 'testing2@mailinator.com', 'Message 2');

        $queryTable = $this->getConnection()->createQueryTable(
            'message', 'SELECT name, email, message FROM message'
        );

        $expectedTable = $this->createFlatXmlDataSet("message_expected.xml")
            ->getTable("message");

        $this->assertTablesEqual($expectedTable, $queryTable);
    }
}
