<?php

class Masterclass
{
    private $name = '';
    private $description = '';
    private $capacity = 0;
    private $teacher = null;
    private $students = [];
    private $place = '';
    private $startDate = null;
    private $endDate = null;

    /**
     * Masterclass constructor
     *
     * @param string $name
     * @param string $description
     * @param int    $capacity
     * @param User   $teacher
     * @param array  $students
     * @param string $place
     * @param DateTime   $date
     */
    public function __construct(
        string $name,
        string $description,
        int $capacity,
        User $teacher,
        array $students,
        string $place,
        DateTime $date
    ) {
        $this->name        = $name;
        $this->description = $description;
        $this->capacity    = $capacity;
        $this->teacher     = $teacher;
        $this->students    = $students;
        $this->place       = $place;
        $this->date        = $date;
    }

    /**
     * Description getName function
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Masterclass
     */
    public function setName(string $name): Masterclass
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Description getDescription function
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Masterclass
     */
    public function setDescription(string $description): Masterclass
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Description getCapacity function
     *
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     *
     * @return Masterclass
     */
    public function setCapacity(int $capacity): Masterclass
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Description getTeacher function
     *
     * @return User
     */
    public function getTeacher() :User
    {
        return $this->teacher;
    }

    /**
     * @param User $teacher
     *
     * @return Masterclass
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Description getStudents function
     *
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * @param array $students
     *
     * @return Masterclass
     */
    public function setStudents(array $students): Masterclass
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Description getPlace function
     *
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @param string $place
     *
     * @return Masterclass
     */
    public function setPlace(string $place): Masterclass
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Description getStartDate function
     *
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * Description setStartDate function
     *
     * @param DateTime $startDate
     *
     * @return $this
     */
    public function setStartDate(DateTime $startDate): Masterclass
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Description getEndDate function
     *
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * Description setEndDate function
     *
     * @param DateTime $endDate
     *
     * @return $this
     */
    public function setEndDate(DateTime $endDate): Masterclass
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function isValidDate() :bool
    {
        /** @var DateTime $now */
        $now = new DateTime();
        /** @var int $nowTimestamp */
        $nowTimestamp = $now->getTimestamp();
        /** @var int $endDateTimestamp */
        $endDateTimestamp = $this->endDate->getTimestamp();
        /** @var int $startDateTimestamp */
        $startDateTimestamp = $this->startDate->getTimestamp();

        if ($endDateTimestamp - $startDateTimestamp <= 0 || $this->startDate->getTimestamp() < $nowTimestamp){
            return false;
        }

        return true;
    }
}