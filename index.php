<?php
/**
 * User: Cynthia Pham
 * Date: 1/16/2018
 * Time: 4:45 PM
 * index.php : Sets default route to pages/home.html
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

//Defined route to pages/personal.html
$f3->route('GET /personal', function() {
    $view = new View;
    echo $view->render
    ('pages/personal.html');
}
);

//Defined route to pages/profile.html
$f3->route('POST /profile', function() {
    $view = new View;
    echo $view->render
    ('pages/profile.html');
}
);

//Run fat free
$f3->run();

?>