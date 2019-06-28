<?php

class User
{
    protected $email = "";
    protected $nom = "";
    protected $prenom = "";
    protected $age = 0;
    protected $userType = 0;
    protected $shoolName = "";
    protected $promotion = "";

    const USER_TYPE_TEACHER = 1;
    const USER_TYPE_STUDENT = 2;

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

    public function getUserType(): int
    {
        return $this->userType;
    }

    public function setUserType(int $userType): int
    {
        return $this->userType = $userType;
    }

    public function getSchoolName(): string
    {
        return $this->shoolName;
    }

    public function setSchoolName(string $schoolName): string
    {
        return $this->schoolName = $schoolName;
    }

    public function getPromotion(): string
    {
        return $this->promotion;
    }

    public function setPromotion(string $promotion): string
    {
        return $this->promotion = $promotion;
    }

    public function isValid()
    {
        return !(
            $this->isEmpty($this->getNom()) ||
            $this->isEmpty($this->getPrenom()) ||
            $this->isEmpty($this->getEmail()) ||
            $this->isEmpty($this->getAge()) ||
            $this->isEmpty($this->userTypeisValid()) ||
            $this->isEmpty($this->getSchoolName()) ||
            $this->isEmpty($this->getPromotion()
        ));
    }

    protected function isEmpty($data) {
        return $data === null || $data === '';
    }

    public function userTypeisValid(){
        return ($this->getUserType() == self::USER_TYPE_TEACHER || $this->getUserType() == self::USER_TYPE_STUDENT);
    }

    public function promotionIsValidForStudent()
    {
        return ($this->userTypeisValid() && $this->getUserType() == self::USER_TYPE_STUDENT);
    }
}