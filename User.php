<?php

class User
{
    protected $email = "";
    protected $nom = "";
    protected $prenom = "";
    protected $age = 0;
    protected $isTeacher = false;
    protected $schoolName = "";
    protected $promotion = "";

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        if ( !preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $email ) ){
            throw new InvalidArgumentException('L\'email est invalide');
        }
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return User
     */
    public function setNom(string $nom): User
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return User
     */
    public function setPrenom(string $prenom): User
    {
        $this->prenom = $prenom;

        return $this;
    }
  
    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return User
     */
    public function setAge(int $age): User
    {
        if ($age < 13) {
            throw new InvalidArgumentException('L\'age doit être supérieur à 13 ans');
        }
        $this->age = $age;

        return $this;
    }

    public function isTeacher(): bool
    {
        return $this->isTeacher;
    }

    public function setIsTeacher(bool $isTeacher): User
    {
        $this->isTeacher = $isTeacher;

        return $this;
    }

    public function getSchoolName(): string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): User
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    public function getPromotion(): string
    {
        return $this->promotion;
    }

    public function setPromotion(string $promotion): User
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function isValid()
    {
        return !(
            $this->isEmpty($this->getNom()) ||
            $this->isEmpty($this->getPrenom()) ||
            $this->isEmpty($this->getEmail()) ||
            $this->isEmpty($this->getAge()) ||
            $this->isEmpty($this->getSchoolName()) ||
            $this->isEmpty($this->getPromotion()
        ));
    }

    protected function isEmpty($data) {
        return $data === null || $data === '';
    }

    public function isPromotionValidForStudent()
    {
        if (!$this->getPromotion() || $this->isTeacher) {
            return false;
        }

        return true;
    }
}