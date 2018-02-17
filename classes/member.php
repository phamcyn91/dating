<?php
/**
 * Created by PhpStorm.
 * User: phamcyn <Cynthia Pham>
 * Date: 2/15/2018
 * Time: 1:37 PM
 * member.php - Member class that is constructed using first name, last name,
 * age, gender, phone, email, state, seeking, and bio
 */

/**
 * Class Member
 *
 * The Member represents a member of a dating site
 *
 * The Member class represents a Member with a first/last name, age, gender
 * phone number, email address, state of residence, biography, and interest in gender.
 * @author Cynthia Phanm <cpham15@mail.greenriver.edu>
 * @copyright 2018
 */
class Member
{

    protected $fname;
    protected $lname;
    protected $age;
    protected $gender;
    protected $phone;
    protected $email;
    protected $state;
    protected $seeking;
    protected $bio;

    /**
     * Member constructor that takes a first/last name, age,
     * gender, and phone number.
     *
     * @param $fname First name
     * @param $lname Last name
     * @param $age Age
     * @param $gender Gender
     * @param $phone Phone number
     */
    function __construct($fname, $lname, $age,
                        $gender, $phone)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone = $phone;

    }

    /**
     * Gets and returns first name
     *
     * @return $fname First name
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Sets first name
     *
     * @param $fname First name
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * Gets and returns last name
     *
     * @return $lname Last name
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Sets last name
     *
     * @param $lname Last name
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * Gets and returns age
     *
     * @return $age Age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Sets age
     *
     * @param $age Age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Gets and returns gender
     *
     * @return $gender Gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets gender
     *
     * @param $gender Gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Gets and returns phone number
     *
     * @return $phone Phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets phone number
     *
     * @param $phone Phone number
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Gets and returns email address
     *
     * @return $email Email Address
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets email address
     *
     * @param $email Email Address
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Gets and returns the state of residence
     *
     * @return $state State of Residence
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets state of residence
     *
     * @param $state State of Residence
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Gets and returns the gender of companion
     *
     * @return $seeking Gender of seeking companion
     */
    public function getSeeking()
    {
        return $this->seeking;
    }

    /**
     * Sets the gender of the companion
     *
     * @param $seeking Gender of seeking companion
     */
    public function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    /**
     * Gets and returns biography
     *
     * @return $bio Biography
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Sets biography
     *
     * @param $bio Biography
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }



}