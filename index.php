<?php
// controller for the diner project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');
require_once ('model/validation.php');
require_once ('model/data-layer.php');
session_start();
// instantiate Fat-Free
$f3 = Base::instance();
$con = new Controller($f3);

// define routes
$f3->route('GET /', function (){
    $GLOBALS['con']->home();
});

// info view
$f3->route('GET|POST /info', function (){
    $GLOBALS['con']->info();
});

// profile view
$f3->route('GET|POST /profile', function (){
    $GLOBALS['con']->profile();

});

// interests view
$f3->route('GET|POST /interests', function (){
    $GLOBALS['con']->interests();
});

// summary view
$f3->route('GET|POST /summary', function (){
    $GLOBALS['con']->summary();
});

// run Fat-Free
$f3->run();