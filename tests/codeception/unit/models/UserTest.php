<?php

namespace tests\codeception\unit\models;

use yii\codeception\TestCase;
use app\tests\codeception\unit\fixtures\UserFixture;

class UserTest extends TestCase
{

    // tests/codeception/unit/models/UserTest
    /** @var User */
    private $_user = null;

    protected function setUp()
    {
        User::deleteAll();
        parent::setUp();
        $this->_user = new User;

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

    /**
     * @expectedException yii\base\NotSupportedException
     */
    public function testFindIdentityByAccessTokenReturnsTheExpectedObject() {
        User::findIdentityByAccessToken('anyAccessToken');
    }

    public function testGetIdReturnsTheExpectedId() {
        $expectedId = 2;
        $user = new User();
        $user->id=$expectedId;

        $this->assertEquals($expectedId, $user->getId());
    }

    public function testFindIdentityReturnsTheExpectedObject() {
        $expectedAttrs = $this->user['admin'];

        /** @var User $user */
        $user = User::findIdentity($expectedAttrs['id']);

        $this->assertNotNull($user);
        $this->assertInstanceOf('yii\web\IdentityInterface', $user);
        $this->assertEquals($expectedAttrs['username'], $user->username);
        $this->assertEquals($expectedAttrs['password'], $user->password);
        $this->assertEquals($expectedAttrs['authkey'], $user->authkey);
    }

    public function testFindByUsernameReturnsTheExpectedObject() {
        $expectedAttrs = $this->user['admin'];

        /** @var User $user */
        $user = User::findByUsername($expectedAttrs['username']);

        $this->assertNotNull($user);
        $this->assertInstanceOf('yii\web\IdentityInterface', $user);
        $this->assertEquals($expectedAttrs['username'], $user->username);
        $this->assertEquals($expectedAttrs['password'], $user->password);
        $this->assertEquals($expectedAttrs['authkey'], $user->authkey);
    }

    /**
     * @dataProvider nonExistingIdsDataProvider
     */
    public function testFindIdentityReturnsNullIfUserIsNotFount($invalidId) {
        $this->assertNull(User::findIdentity($invalidId));
    }

    public function nonExistingIdsDataProvider() {
        return [[-1], [null], [30]];
    }

    public function fixtures() {
        return [
            'user' => UserFixture::className(),
        ];
    }


}
