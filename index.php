<?php
/**
 * Created by PhpStorm.
 * User: phamcyn (Cynthia Pham)
 * Date: 1/16/2018
 * Time: 4:45 PM
 */


//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Set debug level (0-3)
$f3->set('DEBUG', 3);

//Default route to pages/home.html
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render
    ('pages/home.html');
}
);

//Run fat free
$f3->run();

?>