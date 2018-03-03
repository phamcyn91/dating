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
     * Validates to see if age is no more than 2 digits and does not start with 0.
     * If it not true, it sets $age value to 18.
     *
     * @param $age Age
     */
    public function setAge($age)
    {
        $regexp = '/^[1-9]\d{1}$/';

        if (preg_match($regexp, $age))
        {
            $this->age = $age;
        } else
        {
            $this->age = 18;
        }

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
     * Sets email address (case-insensitive)
     *
     * Validates to see if email starts with a letter and then any digits or letters repeated 0 or more times.
     * Has @ character then any word group followed by . character between one or two times.  Must end in edu
     * or com.  If it doesn't match, it replaces $email value with none@none.com.
     *
     * @param $email Email Address
     */
    public function setEmail($email)
    {
        $regexp = '/^[a-z][a-z0-9]*@\w+\.(\w*.)?(com|edu)$/i';

        if (preg_match($regexp, $email))
        {
            $this->email = $email;
        } else
        {
            $this->email = "none@none.com";
        }

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
     * Sets state of residence (case-insensitive)
     *
     * Only contains words or space.  Doesn't contain more than 14 characters (including space) since
     * longest word length is 14 (North Carolina).
     * If it doesn't validate, it sets $state value to N/A.
     *
     * @param $state State of Residence
     */
    public function setState($state)
    {
        $regexp = '/^\D{2,14}$/i';

        if (preg_match($regexp, $state))
        {
            $this->state = $state;
        } else
        {
            $this->state = "N/A";
        }
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