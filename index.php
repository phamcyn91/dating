<?php
/**
 * User: Cynthia Pham
 * Date: 1/16/2018
 * Time: 4:45 PM
 * index.php : Sets default route to pages/home.html
 */

    //Error Reporting
    error_reporting( E_ALL);
    ini_set('display_errors', TRUE);

    //Require the autoload file
    require_once('vendor/autoload.php');

    session_start();

    //Create an instance of the Base class
    $f3 = Base::instance();

    //Set debug level (0-3)
    $f3->set('DEBUG', 3);

    //Set indoor interests array
    $f3->set('indoors', array('tv', 'puzzles', 'movies', 'reading', 'cooking', 'playing cards', 'board games', 'video games'));

    //Set outdoor interests array
    $f3->set('outdoors', array('hiking', 'walking', 'biking', 'climbing', 'swimming', 'collecting'));

    //Default route to pages/home.html
    $f3->route('GET /', function() {


        session_destroy();
        session_start();

        $view = new View();
        echo $view->render

        ('views/home.html');
    }
    );

    //Defined route to pages/personal.html
    $f3->route('GET|POST /personal', function($f3) {

        if (isset($_POST['submit'])) {

            // storing POST values from profile.html to PHP variables
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];

            // storing POST values in fat-free to make the form sticky
            $f3->set('firstName', $firstName);
            $f3->set('lastName', $lastName);
            $f3->set('age', $age);
            $f3->set('gender', $_POST['gender']);
            $f3->set('phone', $phone);
            $f3->set('premium', $_POST['premium']);

            // validation
            include('model/validate.php');

            if ($profileSuccess) {

                // construct Member/PremiumMember object
                if (isset($_POST['premium'])) {
                    $member = new PremiumMember($firstName, $lastName,
                        $age, $_POST['gender'], $phone);
                }
                else {
                    $member = new Member($firstName, $lastName,
                        $age, $_POST['gender'], $phone);
                }

                // save member object to the session
                $_SESSION['member'] = $member;


                $f3->reroute('./profile');

            } else {

                $f3->set('profileErrors', $profileErrors);

                //load a template
                echo Template::instance()->render('views/personal.html');
            }
        } else {

            session_destroy();
            session_start();


            echo Template::instance()->render('views/personal.html');

        }
    }
    );



    //Defined route to pages/profile.html
    $f3->route('GET|POST /profile', function($f3) {

        if (isset($_POST['submit'])) {

            // storing POST values in fat-free to make the form sticky
            $f3->set('email', $_POST['email']);
            $f3->set('state', $_POST['state']);
            $f3->set('seeking', $_POST['seeking']);
            $f3->set('bio', $_POST['bio']);

            // get member object from session
            $member = $_SESSION['member'];

            // set Member/Premium Member form data
            $member->setEmail($_POST['email']);
            $member->setState($_POST['state']);
            $member->setSeeking($_POST['seeking']);
            $member->setBio($_POST['bio']);

            // save member object to session
            $_SESSION['member'] = $member;

            // directs to interest.html if PremiumMember. Otherwise to summary.html
            if ($member instanceof PremiumMember) {

                $f3->reroute('./interests');
            }
            else {

                $f3->reroute('./summary');
            }


        } else {


            echo Template::instance()->render('views/profile.html');

        }

    }
    );


    //Defined route to pages/interests.html
    $f3->route('GET|POST /interests', function($f3) {

        // validation
        if (isset($_POST['interestSubmit'])) {

            $outdoor = $_POST['outdoor_interests'];
            $indoor = $_POST['indoor_interests'];

            include('model/validate.php');

            // validation
            if ($interestSuccess) {

                // get member object from session
                $member = $_SESSION['member'];

                // set indoor and outdoor interests in member object
                $member->setOutDoorInterests($outdoor);
                $member->setInDoorInterests($indoor);

                $_SESSION['outdoor'] = $outdoor;
                $_SESSION['indoor'] = $indoor;

                // save member object to session
                $_SESSION['member'] = $member;

                $f3->reroute('./summary');

            } else {

                $f3->set('interestErrors', $interestErrors);

                //load a template
                echo Template::instance()->render('views/interests.html');
            }
        } else {

            echo Template::instance()->render('views/interests.html');

        }
    }
    );

    //Defined route to pages/profile_summary.html
    $f3->route('GET|POST /summary', function() {


        //load a template
        echo Template::instance()->render('views/profile_summary.html');
    }
    );


    //Run fat free
    $f3->run();

?>