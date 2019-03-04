<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 28/2/2019
 * Time: 22:33
 */

class userTest extends PHPUnit_Extensions_Selenium2TestCase
{

    public function validInputsProvider()
    {
        $inputs[] = [
            [
                'username' => 'billpwchan@hotmail.com',
                'password' => '12345678Aa*',
            ]
        ];

        return $inputs;
    }

    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('http://localhost:63342/COMP0034_GroupM/index.php');
        $this->setBrowser('chrome');
    }

    public function tearDown()
    {
        $this->stop();
    }

    public function testSelectUserByEmail()
    {

    }

    public function testActivateAccount()
    {

    }

    public function testRegister()
    {

    }
}
