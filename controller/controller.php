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

        // if form submitted then validate data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // get user data
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $_SESSION['gender'] = $_POST['gender'];

            // validate first name
            if (Validation::validName($fname)) {
                $_SESSION['fname'] = $_POST['fname'];
            }
            else {
                $this->_f3->set('errors["fname"]', 'First name may only 
                contain letters and spaces and cannot be blank');
            }

            // validate last name
            if (Validation::validName($lname)) {
                $_SESSION['lname'] = $_POST['lname'];
            }
            else {
                $this->_f3->set('errors["lname"]', 'Last name may only 
                contain letters and spaces and cannot be blank');
            }

            // validate age
            if (Validation::validAge($age)) {
                $_SESSION['age'] = $_POST['age'];
            }
            else {
                $this->_f3->set('errors["age"]', 'Age must be from 18 to 118 
                and cannot be blank');
            }

            // validate phone
            if (Validation::validPhone($phone)) {
                $_SESSION['phone'] = $_POST['phone'];
            }
            else {
                $this->_f3->set('errors["phone"]', 'Phone number must only contain 
                numbers without spaces and cannot be blank. Example: 7572555555');
            }

            //If there are no errors, redirect to order2 route
            if (empty($this->_f3->get('errors'))) {
                header('location: profile');
            }

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

            $email = $_POST['email'];
            // validate first name
            if (Validation::validEmail($email)) {
                $_SESSION['email'] = $_POST['email'];
            }
            else {
                $this->_f3->set('errors["email"]', 'Invalid Email. 
                Email cannot be blank. 
                Example: MyName@bing.com');
            }

            $bio = $_POST['textarea'];
            $_SESSION['bio'] = $bio;
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['seekinggender'] = $_POST['seekinggender'];

            //If there are no errors, redirect to order2 route
            if (empty($this->_f3->get('errors'))) {
                header('location: interests');
            }
        }

        // instantiate a view object
        $view = new Template();
        echo $view->render('views/profile.html');
    }


    function interests()
    {

        //Initialize variables for user input
        $userIndoor = array();
        $userOutdoor = array();

        //If the form has been submitted, validate the data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);

            //If indoor interests are selected
            if (!empty($_POST['indoor'])) {

                //Get user input
                $userIndoor = $_POST['indoor'];

                //If interests are valid
                if (Validation::validIndoor($userIndoor)) {
                    $_SESSION['indoor'] = implode(", ", $userIndoor);
                }
                else {
                    $this->_f3->set('errors["indoor"]', 'Invalid selection');
                }
            }

            //If outdoor interests are selected
            if (!empty($_POST['outdoor'])) {

                //Get user input
                $userOutdoor = $_POST['outdoor'];

                //If interests are valid
                if (Validation::validOutdoor($userOutdoor)) {
                    $_SESSION['outdoor'] = implode(", ", $userOutdoor);
                }
                else {
                    $this->_f3->set('errors["outdoor"]', 'Invalid selection');
                }
            }

            //If the error array is empty, redirect to summary page
            if (empty($this->_f3->get('errors'))) {
                header('location: summary');
            }
        }

        //var_dump($userIndoor);

        //Get interests from the Model and send them to the View
        $this->_f3->set('indoors', DataLayer::indoorInterests());
        $this->_f3->set('outdoors', DataLayer::outdoorInterests());

        //Add the user data to the hive
        $this->_f3->set('userIndoors', $userIndoor);
        $this->_f3->set('userOutdoors', $userOutdoor);

        // instantiate a view object
        $view = new Template();
        echo $view->render('views/interests.html');
    }

    function summary()
    {
        // instantiate a view object
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}