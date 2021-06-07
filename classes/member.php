<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    public function __construct($fname="", $lname="", $age="", $gender="", $phone="")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    public function setFname(string $fname): void
    {
        $this->_fname = $fname;
    }

    public function getFname(): string
    {
        return $this->_fname;
    }

    public function setLname(string $lname): void
    {

        $this->_lname = $lname;
    }

    public function getLname(): string
    {
        return $this->_lname;
    }

    public function setAge(int $age): void
    {
        $this->_age = $age;
    }

    public function getAge(): int
    {
        return $this->_age;
    }

    public function setGender(string $gender): void
    {
        $this->_gender = $gender;
    }

    public function getGender(): string
    {
        return $this->_gender;
    }

    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->_phone;
    }

    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    public function getEmail(): string
    {
        return $this->_email;
    }

    public function setState(string $state): void
    {
        $this->_state = $state;
    }

    public function getState(): string
    {
        return $this->_state;
    }

    public function setSeeking(string $seeking): void
    {
        $this->_seeking = $seeking;
    }

    public function getSeeking(): string
    {
        return $this->_seeking;
    }

    public function setBio(string $bio): void
    {
        $this->_bio = $bio;
    }

    public function getBio(): string
    {
        return $this->_bio;
    }


}