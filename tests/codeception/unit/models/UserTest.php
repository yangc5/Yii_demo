<?php

namespace tests\codeception\unit\models;

use yii\codeception\TestCase;

class UserTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        // uncomment the following to load fixtures for user table
        //$this->loadFixtures(['user']);
    }

    // TODO add test methods here

    public function testValidateReturnsFalseIfParametersAreNotSet() {
        $user = new User;
        $this->assertFalse($user->validate(), "New User should not validate");
    }

    public function testValidateReturnsTrueIfParametersAreSet() {
        $configurationParams = [
            'username' => 'a valid username',
            'password' => 'a valid password',
            'authkey' => 'a valid authkey'
        ];
        $user = new User($configurationParams);
        $this->assertTrue($user->validate(), "User with set parameters should validate");
    }


}
