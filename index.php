<?php
// controller for the diner project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');

// instantiate Fat-Free
$f3 = Base::instance();

// define routes
$f3->route('GET /', function (){
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/home.html');
});

//
// order 1 view
$f3->route('GET|POST /info', function (){
    // if form submitted then store data in session array
    // send user to the next order form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];
        header('location: order2');
    }

    // instantiate a view object
    $view = new Template();
    echo $view->render('views/info.html');
});

// run Fat-Free
$f3->run();