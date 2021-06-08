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


    /**
     * Member constructor takes in string values and assigns them to the matching
     * variables that are private member sof this class (this->_variableName)
     * @param string $fname string for first name
     * @param string $lname string for last name
     * @param string $age numeric string for age
     * @param string $gender string for gender
     * @param string $phone numeric string for phone number
     */
    public function __construct($fname="", $lname="", $age="", $gender="", $phone="")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    /** takes in a string and assigns it to class private variable _fname
     * @param string $fname string for first name
     */
    public function setFname(string $fname): void
    {
        $this->_fname = $fname;
    }

    /** returns the string value of class private variable _fname
     * @return string string for first name
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /** takes in a string and assigns it to class private variable _lname
     * @param string $lname string for last name
     */
    public function setLname(string $lname): void
    {

        $this->_lname = $lname;
    }

    /** returns the string value of class private variable _lname
     * @return string string for last name
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /** take in an integer and assigns its value to class private
     * variable _age
     * @param int $age integer for age
     */
    public function setAge(int $age): void
    {
        $this->_age = $age;
    }

    /** returns the integer value of class private variable _age
     * @return int int for age
     */
    public function getAge(): int
    {
        return $this->_age;
    }

    /** takes in a string and assigns its value to class private
     * variable _gender
     * @param string $gender string for gender
     */
    public function setGender(string $gender): void
    {
        $this->_gender = $gender;
    }

    /** returns the string value of class private variable _gender
     * @return string string for gender
     */
    public function getGender(): string
    {
        return $this->_gender;
    }

    /** takes in a numeric string and assigns its value to class
     * private variable _phone
     * @param string $phone numeric string for phone number
     */
    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }

    /** returns the string value of class private variable _phone
     * @return string numeric string for phone number
     */
    public function getPhone(): string
    {
        return $this->_phone;
    }

    /** takes in an email address as a string and assigns it to
     * class private variable _email
     * @param string $email string for email address
     */
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /** returns the string value of class private variable _email
     * @return string string for email address
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /** takes in a string for state name and assigns its value
     * to the class private variable _state
     * @param string $state string for state name
     */
    public function setState(string $state): void
    {
        $this->_state = $state;
    }

    /** returns the string value of class private variable _state
     * @return string string for state name
     */
    public function getState(): string
    {
        return $this->_state;
    }

    /** takes in a string for seeking gender and assigns it to
     * class private variable _seeking
     * @param string $seeking string for seeking gender
     */
    public function setSeeking(string $seeking): void
    {
        $this->_seeking = $seeking;
    }

    /** returns the string value of class private variable _seeking
     * @return string string for seeking gender
     */
    public function getSeeking(): string
    {
        return $this->_seeking;
    }

    /** takes in a string for the biography and assigns it
     * to class private variable _bio
     * @param string $bio string for biography
     */
    public function setBio(string $bio): void
    {
        $this->_bio = $bio;
    }

    /** returns the string value of class private variable _bio
     * @return string string for biography
     */
    public function getBio(): string
    {
        return $this->_bio;
    }


}