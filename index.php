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

    //Default route to pages/home.html
    $f3->route('GET /', function() {
        $view = new View();
        echo $view->render
        ('pages/home.html');
    }
    );

    //Defined route to pages/personal.html
    $f3->route('GET /personal', function() {
        $view = new View();
        echo $view->render
        ('pages/personal.html');
    }
    );

    //Defined route to pages/profile.html
    $f3->route('POST /profile', function() {

        // storing POST values from personal.html to SESSION variables
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phoneNumber'] = $_POST['phoneNumber'];


        $view = new View();
        echo $view->render
        ('pages/profile.html');
    }
    );


    //Defined route to pages/interests.html
    $f3->route('POST /interests', function() {

        // storing POST values from personal.html to SESSION variables
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['bio'] = $_POST['bio'];

        $view = new View();
        echo $view->render
        ('pages/interests.html');
    }
    );

    //Defined route to pages/profile_summary.html
    $f3->route('POST /summary', function($f3) {

        // storing POST values from interests.html to SESSION variables
        $_SESSION['outdoor'] = $_POST['outdoor_interests'];
        $_SESSION['indoor'] = $_POST['indoor_interests'];


        // storing SESSION variables into fat-free
        $f3->set('firstName', $_SESSION['firstName']);
        $f3->set('lastName', $_SESSION['lastName']);
        $f3->set('age', $_SESSION['age']);
        $f3->set('gender', $_SESSION['gender']);
        $f3->set('phoneNumber', $_SESSION['phoneNumber']);

        $f3->set('email', $_SESSION['email']);
        $f3->set('state', $_SESSION['state']);
        $f3->set('seeking', $_SESSION['seeking']);
        $f3->set('bio', $_SESSION['bio']);

        $f3->set('outdoor', $_SESSION['outdoor']);
        $f3->set('indoor', $_SESSION['indoor']);

        $template = new Template();
        echo $template->render
        ('pages/profile_summary.html');
    }
    );


    //Run fat free
    $f3->run();

?>