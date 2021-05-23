<?php
class Controller
{
    private $_f3; //router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // instantiate a view object
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function info()
    {
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
    }

    function profile()
    {
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
    }


    function interests()
    {
        // instantiate a view object
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}