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

    public function testFormSubmissionWithUsername()
    {
//        $this->byName('email')->value('newacc@mailinator.com');
//        $this->byName('pass')->value('12345678Aa*');
//        $this->byId('#login-button')->submit();
        echo $this->title();
        $this->assertEquals('Welcome to UberKidz!', $this->title());
    }

    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('localhost:63342/COMP0034_GroupM/login.php');
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
