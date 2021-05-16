<?php
// controller for the diner project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');
session_start();
// instantiate Fat-Free
$f3 = Base::instance();

// define routes
$f3->route('GET /', function (){
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/home.html');
});

// info view
$f3->route('GET|POST /info', function (){
    //Reinitialize session array
    $_SESSION = array();

    // if form submitted then store data in session array
    // then send user to the next order form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['gender'] = $_POST['gender'];
        header('location: profile');
    }

    // instantiate a view object
    $view = new Template();
    echo $view->render('views/info.html');
});

// profile view
$f3->route('GET|POST /profile', function (){

    // if form submitted then store data in session array
    // then send user to the next order form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bio = $_POST['textarea'];

        $_SESSION['bio'] = $bio;
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seekinggender'] = $_POST['seekinggender'];
        $_SESSION['email'] = $_POST['email'];
        header('location: interests');
    }

    // instantiate a view object
    $view = new Template();
    echo $view->render('views/profile.html');
});

// interests view
$f3->route('GET|POST /interests', function (){

    // if form submitted then store data in session array
    // then send user to the next order form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['indoor'] = implode(", ", $_POST['indoor']);
        $_SESSION['outdoor'] = implode(", ", $_POST['outdoor']);
        header('location: summary');
    }

    // instantiate a view object
    $view = new Template();
    echo $view->render('views/interests.html');
});

// summary view
$f3->route('GET|POST /summary', function (){

    // instantiate a view object
    $view = new Template();
    echo $view->render('views/summary.html');
});

// run Fat-Free
$f3->run();