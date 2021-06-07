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

            // instantiate a new member or premium member object
            if (isset($_POST['premium'])) {
                $member = new PremiumMember();
            } else {
                $member = new Member();
            }

            // get user data
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $member->setGender($_POST['gender']);


            // validate first name
            if (Validation::validName($fname)) {
                $member->setFname($_POST['fname']);
            }
            else {
                $this->_f3->set('errors["fname"]', 'First name may only 
                contain letters and spaces and cannot be blank');
            }

            // validate last name
            if (Validation::validName($lname)) {
                $member->setLname($_POST['lname']);
            }
            else {
                $this->_f3->set('errors["lname"]', 'Last name may only 
                contain letters and spaces and cannot be blank');
            }

            // validate age
            if (Validation::validAge($age)) {
                $member->setAge($_POST['age']);
            }
            else {
                $this->_f3->set('errors["age"]', 'Age must be from 18 to 118 
                and cannot be blank');
            }

            // validate phone
            if (Validation::validPhone($phone)) {
                $member->setPhone($_POST['phone']);
            }
            else {
                $this->_f3->set('errors["phone"]', 'Phone number must only contain 
                numbers without spaces and cannot be blank. Example: 7572555555');
            }

            //If there are no errors, save member object to session
            // then redirect to order2 route
            if (empty($this->_f3->get('errors'))) {
                $_SESSION['member'] = $member;
                header('location: profile');
            }

        }

        // instantiate a view object
        $view = new Template();
        echo $view->render('views/info.html');
    }

    function profile()
    {
        // if form submitted then process data
        // then send user to the next order form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // get member object from session
            $member = $_SESSION['member'];
            $email = $_POST['email'];
            // validate first name
            if (Validation::validEmail($email)) {
                $member->setEmail($_POST['email']);
            }
            else {
                $this->_f3->set('errors["email"]', 'Invalid Email. 
                Email cannot be blank. 
                Example: MyName@bing.com');
            }

            $bio = $_POST['textarea'];
            $member->setBio($bio);
            $member->setState($_POST['state']);
            $member->setSeeking($_POST['seekinggender']);

            //If there are no errors, store member object
            //in session then route to interests if premium member
            //or to summary if regular member
            if (empty($this->_f3->get('errors'))) {
                $_SESSION['member'] = $member;
                if ($member instanceof PremiumMember) {
                    header('location: interests');
                }  else {
                    header('location: summary');
                }
            }
        }

        // instantiate a view object
        $view = new Template();
        echo $view->render('views/profile.html');
    }


    function interests()
    {

        // get the member object from session
        $member = $_SESSION['member'];

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
                    $member->setIndoorInterest($userIndoor);
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
                    $member->setOutdoorInterest($userOutdoor);
                }
                else {
                    $this->_f3->set('errors["outdoor"]', 'Invalid selection');
                }
            }

            //If the error array is empty, store member object in session
            //then redirect to summary page
            if (empty($this->_f3->get('errors'))) {
                $_SESSION['member'] = $member;
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