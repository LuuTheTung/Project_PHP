<?php
require_once('controller/BaseController.php');
require_once('model/account/AccountDAOImpl.php');
require_once('model/account/CitizenDAOImpl.php');

class AuthenticationController
{

    public function onClickSignUpButton()
    {
        BaseController::render('signUp');
    }

    public function onClickSubmitSignInButton()
    {
        $username = htmlentities($_POST['username']);
        $password = md5($_POST['password']);
        $valid = Account::isValid($username, $password);
        if ($valid) {
            echo "<script type='text/javascript'> document.location ='index.php'; </script>";
        } else {
            echo "<script>alert('Invalid Details');</script>";
            BaseController::render('signIn');
        }
    }

    public function onClickSubmitSignUpButton()
    {
        $info = array(
            'username' => htmlentities($_POST['username']),
            'password' => md5($_POST['password']),
            'phone' => htmlentities($_POST['phone']),
            'address' => htmlentities($_POST['address']),
            'firstName' => htmlentities($_POST['firstName']),
            'lastName' => htmlentities($_POST['lastName']),
            'citizenID' => htmlentities($_POST['citizenID']),
            'DoB' => htmlentities($_POST['DoB'])
        );
        $account = new Citizen($info);

        $exist = AccountDAOImpl::exist($account);

        if ($exist == 1) {
            CitizenDAOImpl::create($account);
            echo "<script>alert('Created an account. You can sign in now!');</script>";
            echo "<script type='text/javascript'> document.location ='index.php?controller=Authentication&action=onClickSignInButton'; </script>";
        } else if ($exist == 0) {
            echo "<script>alert('Invalid Username');</script>";
            BaseController::render('signUp');
        } else {
            echo "<script>alert('Invalid Phone Number');</script>";
            BaseController::render('signUp');
        }
    }

    public function onClickSignInButton()
    {
        BaseController::render('signIn');
    }

    public function onClickSignOutButton()
    {
        $_SESSION['login'] = '';
        $_SESSION['accountType'] = '';
        $_SESSION['accountID'] = '';
        BaseController::render('signIn');
    }
}
