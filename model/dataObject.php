<?php
/**
 * Created by PhpStorm.
 * User: phamcyn
 * Date: 2/28/2018
 * Time: 4:30 PM
 */

/* CREATE TABLE members (
	member_id int PRIMARY KEY AUTO_INCREMENT,
    fname varchar(30),
    lname varchar(30),
    age int,
    gender varchar(6),
    phone int,
    email varchar(30),
    state varchar(30),
    seeking varchar(6),
    bio varchar(100),
    premium tinyint,
    image varchar(100),
    interests varchar(200)
);
*/

    require_once('/home/cphamgre/config.php');

    /**
     * Connects to Database cphamgre_grc
     *
     * Connects to Database cphamgre_grc using username and password from
     * config.php.  Creates new database object
     *
     * @return PDO|void
     */
     class DataObject {

        protected $dbh;

        /**
         * DataObject constructor.
         *
         * DataObject constructor instantiates a database object by using the credentials defined in
         * /home/cphamgre/config.php
         */
        public function __construct() {

            try {
                //Instantiate a database object
                $this->dbh = new PDO(DB_DSN, DB_USERNAME,
                    DB_PASSWORD );
                //return $dbh;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return;
            }

        }


        protected function disconnect() {
            //$dbh = "";
            $this->dbh = "";
        }


        /**
         * Adds member to database
         *
         * Adds member to database after gathering first name, last name, age, gender,
         * phone number, email, state of residence, biography, seeking gender, and interests
         *
         * @param $firstName First name of member
         * @param $lastName Last name of member
         * @param $age Age of memmber
         * @param $gender Gender of member
         * @param $phone Phone number of member
         * @param $email Email address of member
         * @param $state State of residence of member
         * @param $seeking Gender of seeking mate
         * @param $bio Biography
         * @param $premium Whether member is premium member or not
         * @param $image Image path of member's profile pic
         * @param $interests Member's interests
         */
        public function addMember($fname, $lname, $age, $gender, $phone, $email,
                           $state, $seeking, $bio, $premium, $image, $interests) {

            //global $dbh;

            //Define query
            $sql = "INSERT INTO members (fname, lname, age, gender, phone, email, state, 
          seeking, bio, premium, image, interests) VALUES (:fname, :lname, :age, :gender, 
          :phone, :email, :state, :seeking, :bio, :premium, :image, :interests)";

            //prepare the statement
            $statement = $this->dbh->prepare($sql);

            $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
            $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
            $statement->bindParam(':age',$age, PDO::PARAM_INT);
            $statement->bindParam(':gender',$gender, PDO::PARAM_STR);
            $statement->bindParam(':phone',$phone, PDO::PARAM_INT);
            $statement->bindParam(':email',$email, PDO::PARAM_STR);
            $statement->bindParam(':state',$state, PDO::PARAM_STR);
            $statement->bindParam(':seeking',$seeking, PDO::PARAM_STR);
            $statement->bindParam(':bio',$bio,PDO::PARAM_STR);
            $statement->bindParam(':premium',$premium, PDO::PARAM_BOOL);
            $statement->bindParam(':image',$image, PDO::PARAM_STR);
            $statement->bindParam(':interests',$interests, PDO::PARAM_STR);

            //Execute
            $statement->execute();
        }

        /**
         * Gets members from database
         *
         * Selects all members from Members database table and returns
         * as an array.
         *
         * @return array
         */
        public function getMembers() {

            //global $dbh;

            $sql = "SELECT * FROM members ORDER BY lname, fname";

            //2. Prepare the statement
            $statement = $this->dbh->prepare($sql);

            //4. Execute the query
            $statement->execute();

            //5. Get the results
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        /**
         * Returns member by specific member id
         *
         * Selects member from Members table by member_id.  Returns a Member class
         * object.
         *
         * @param $member_id member id (Primary key of members table)
         * @return Member|PremiumMember Member or PremiumMember class object
         */
        public function getMember($member_id) {

            //global $dbh;

            //1. Define the query
            $sql = "SELECT * FROM members WHERE member_id = :member_id";

            //2. Prepare the statement
            $statement = $this->dbh->prepare($sql);

            //3. Bind parameters
            $statement->bindParam(':member_id', $member_id, PDO::PARAM_INT);

            //4. Execute the query
            $statement->execute();

            //5. Get the results
            $member = $statement->fetch(PDO::FETCH_ASSOC);

            //create new Member/Premium class object
            if ($member instanceof PremiumMember) //premium member object
            {
                $member1 = new PremiumMember($member[fname], $member[lname], $member[age],
                    $member[gender], $member[phone]);

                $member1->setInDoorInterests($member[interests]);


            } else //member object
            {
                $member1 = new Member($member[fname], $member[lname], $member[age],
                    $member[gender], $member[phone]);
            }

            //set Member object values
            $member1->setBio($member[bio]);
            $member1->setSeeking($member[seeking]);
            $member1->setState($member[state]);
            $member1->setEmail($member[email]);

            //6. Return student
            return $member1;
        }

    }