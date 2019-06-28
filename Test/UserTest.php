<?php

use PHPUnit\Framework\TestCase;

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
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');

        $this->assertEquals(true, $this->user->isValid());
    }

    public function testEmptyNameUser() {
        $this->user->setNom('')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');

        $this->assertEquals(false, $this->user->isValid());
    }

    public function testNullEmailUser() {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setAge(22)
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
            ->setSchoolName('ESGI')
            ->setPromotion('4IW3');
    }

    public function testEmptySchoolName()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setPromotion('4IW3');

        $this->assertEquals(false, $this->user->isValid());
    }

    public function testEmptyPromotion()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setSchoolName('ESGI');

        $this->assertEquals(false, $this->user->isValid());
    }

    public function testPromotionIsNotValidBecauseOfTeacher()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setIsTeacher(true)
            ->setSchoolName('ESGI')
            ->setPromotion('IW4');

        $this->assertEquals(false, $this->user->isPromotionValidForStudent());
    }

    public function testPromotionIsNotValidBecauseOfMissingPromotion()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setIsTeacher(false)
            ->setSchoolName('ESGI');

        $this->assertEquals(false, $this->user->isPromotionValidForStudent());
    }

    public function testPromotionIsValidForStudent()
    {
        $this->user->setNom('Crepy')
            ->setPrenom('Tanguy')
            ->setEmail('tanguycrepy@gmail.com')
            ->setAge(22)
            ->setIsTeacher(false)
            ->setSchoolName('ESGI')
            ->setPromotion('IW34');

        $this->assertEquals(true, $this->user->isPromotionValidForStudent());
    }
}