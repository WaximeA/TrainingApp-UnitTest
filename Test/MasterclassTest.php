<?php

use PHPUnit\Framework\TestCase;

class MasterclassTest extends TestCase
{
    protected $masterclass;
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
}