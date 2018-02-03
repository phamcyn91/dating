<?php
/**
 * User: Cynthia Pham
 * Date: 1/16/2018
 * Time: 4:45 PM
 * index.php : Sets default route to pages/home.html
 */

    session_start();

    //Error Reporting
    error_reporting( E_ALL);
    ini_set('display_errors', TRUE);

    //Require the autoload file
    require_once('vendor/autoload.php');

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

            // validation
            include('model/validate.php');

            if ($profileSuccess) {

                // storing POST values from personal.html to SESSION variables
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['age'] = $age;
                $_SESSION['phone'] = $phone;
                $_SESSION['gender'] = $_POST['gender'];


                $f3->reroute('./profile');

            } else {

                $f3->set('profileErrors', $profileErrors);

                //load a template
                echo Template::instance()->render('views/personal.html');
            }
        } else {

            echo Template::instance()->render('views/personal.html');

        }
    }
    );

    //Defined route to pages/profile.html
    $f3->route('GET|POST /profile', function($f3) {

        // storing POST values in fat-free to make the form sticky
        $f3->set('email', $_POST['email']);
        $f3->set('state', $_POST['state']);
        $f3->set('seeking', $_POST['seeking']);
        $f3->set('bio', $_POST['bio']);

        echo Template::instance()->render('views/profile.html');

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

                // storing POST values from interests.html to SESSION variables
                $_SESSION['outdoor'] = $outdoor;
                $_SESSION['indoor'] = $indoor;

                $f3->reroute('./summary');

            } else {

                $f3->set('interestErrors', $interestErrors);

                //load a template
                echo Template::instance()->render('views/interests.html');
            }
        } else {

            // storing POST values from personal.html to SESSION variables
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['seeking'] = $_POST['seeking'];
            $_SESSION['bio'] = $_POST['bio'];

            echo Template::instance()->render('views/interests.html');

        }
    }
    );

    //Defined route to pages/profile_summary.html
    $f3->route('GET|POST /summary', function($f3) {

        // storing POST values from interests.html to SESSION array variables
        $_SESSION['outdoor'] = $_POST['outdoor_interests'];
        $_SESSION['indoor'] = $_POST['indoor_interests'];


        // storing SESSION variables into fat-free
        $f3->set('firstName', $_SESSION['firstName']);
        $f3->set('lastName', $_SESSION['lastName']);
        $f3->set('age', $_SESSION['age']);
        $f3->set('gender', $_SESSION['gender']);
        $f3->set('phone', $_SESSION['phone']);

        $f3->set('email', $_SESSION['email']);
        $f3->set('state', $_SESSION['state']);
        $f3->set('seeking', $_SESSION['seeking']);
        $f3->set('bio', $_SESSION['bio']);

        $f3->set('outdoor', $_SESSION['outdoor']);
        $f3->set('indoor', $_SESSION['indoor']);

        //load a template
        echo Template::instance()->render('views/profile_summary.html');
    }
    );


    //Run fat free
    $f3->run();

?>