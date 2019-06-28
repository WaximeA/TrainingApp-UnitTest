<?php

use PHPUnit\Framework\TestCase;

class MasterclassTest extends TestCase
{
    /** @var Masterclass $masterclass */
    protected $masterclass;
    /** @var User $user */
    private $user;

    protected function setUp(): void
    {
        $this->user = $this->createMock(User::class);
        $this->user->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $teacher  = $this->user;
        $students = [$this->user, $this->user];

        $this->masterclass = new Masterclass(
            'Default masterclass',
            'Default masterclass description and nice blabla.',
            10,
            $teacher,
            $students,
            '33 rue by default',
            new DateTime('now + 1 day'),
            new DateTime('now + 2 day')
        );
    }

    protected function tearDown(): void
    {
        $this->masterclass = null;
        $this->user        = null;
    }

    public function testIsValid()
    {
        $this->assertEquals(true, $this->masterclass->isValid());
    }

    public function testisNotValidDateBecauseOfStartDateInPast(): void
    {
        $this->masterclass->setStartDate(new DateTime('01-01-1999'));
        $result = $this->masterclass->isValidDate();
        $this->assertFalse($result);
    }

    public function testisNotValidDateBecauseOfInversedDates(): void
    {
        $this->masterclass->setStartDate(new DateTime('now + 1 day'));
        $this->masterclass->setEndDate(new DateTime('01-01-1999'));
        $result = $this->masterclass->isValidDate();
        $this->assertFalse($result);
    }

    public function testIsNotValidBecauseOfWrongCapacity(): void
    {
        $this->masterclass->setCapacity(0);
        $result = $this->masterclass->isValidCapacity();
        $this->assertFalse($result);
    }

    public function testIfMockedUserIsValid(): void
    {
        $this->assertTrue($this->user->isValid());
    }

    public function testJoinMasterclassSuccess(): void
    {
        $result = $this->masterclass->joinMasterclass($this->user);
        $this->assertInstanceOf(Masterclass::class, $result);
    }

    public function testJoinMasterclassFailBecauseOfWrongStudent(): void
    {
        $this->user->setAge(12);
        $result = $this->masterclass->joinMasterclass($this->user);
        $this->assertInstanceOf(Masterclass::class, $result);
    }
}