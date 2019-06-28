<?php

use PHPUnit\Framework\TestCase;
require '../User.php';

class UserTest extends TestCase
{
    /**
     * @var User $user
     */
    protected $user;

    protected function setUp(): void
    {
        $this->user = new User();
    }

    public function testIsValid()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setUserType(1)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');

        $this->assertEquals(true, $this->user->isValid());
    }

    public function testEmptyNameUser() {
        $this->user->setNom('')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setUserType(1)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');

        $this->assertEquals(false, $this->user->isValid());
    }

    public function testNullEmailUser() {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setAge(22)
            ->setUserType(1)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');

        $this->assertEquals(false, $this->user->isValid());
    }

    public function testAgeUnderTheerteen()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(12);
    }

    public function testInvalidMailUser()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy')
            ->setAge(22)
            ->setUserType(1)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');
    }

    public function testInvalidUserType()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setAge(22)
            ->setUserType(0)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');
        $this->assertEquals(false, $this->user->userTypeisValid());

        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setAge(22)
            ->setUserType(-1)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');
        $this->assertEquals(false, $this->user->userTypeisValid());
    }

    public function testEmptyUserType()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setAge(22)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');

        $this->assertEquals(false, $this->user->isValid());
    }

    public function testValidUserType(){
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setAge(22)
            ->setUserType(1)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');
        $this->assertEquals(true, $this->user->userTypeisValid());

        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setAge(22)
            ->setUserType(2)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');
        $this->assertEquals(true, $this->user->userTypeisValid());
    }

    public function testEmptySchoolName()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setUserType(1)
            ->setPromotion('4IW3');

        $this->assertEquals(false, $this->user->isValid());
    }

    public function testEmptyPromotion()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setUserType(1)
            ->setSchoolName('ESGI');

        $this->assertEquals(false, $this->user->isValid());
    }
}