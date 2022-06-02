<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Controllers
 */
class AuthController extends Controller {

    protected $authmodel;

    public function __construct() {
        parent::__construct();
        $this->authmodel = new AuthModel();
    }

    /**
     * set initial messages.
     * shows racer login page.
     */
    public function showLogin() {
        $this->f3->set('loginMsg1', '');
        $this->f3->set('loginMsg2', '');
        $this->f3->set('loginError', NULL);
        echo $this->template->render('login.html');
    }

    public function showForgotPass() {
        echo $this->template->render('forgotpass.html');
    }

    public function forgotPass() {
        $password = $this->authmodel->randomString();
        $email = filter_input(INPUT_POST, 'email');
        $this->authmodel->sendNewPassword($email, $password);
        $this->authmodel->getByEmail($email);
        $this->authmodel->setNewPassword($password);
        echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
    }

    /**
     * Registers new racer in database
     */
    public function doSignup() {
        $signup = new SignupModel();
        $signup->initSignup();
        echo $this->template->render('activate.html');
    }

    /**
     * Checks if the e-mail exists in the database.
     * 
     * Send text response to XMLHttpRequest that comes from signup.html.
     * Send an echo FALSE if e-mail is not found in DB.
     * Send an echo TRUE if e-mail is found in DB.
     */
    public function checkEmail() {
        $model = new Model();
        $email = $this->f3->get('PARAMS.email');
        $dbdata = $model->getByEmail($email);
        if ($dbdata == false) {
            echo 'FALSE';
        } else {
            echo 'TRUE';
        }
    }

    public function activateAccount() {
        $email = $this->f3->get('PARAMS.email');
        $key = $this->f3->get('PARAMS.key');
        $auth = new AuthModel();
        $auth->activate($email, $key);
        if ($auth->active == true) {
            echo $this->template->render('activateconfirm.html');
        } else {
            echo $this->template->render('activatenegative.html');
        }
    }

    public function showSignup() {
        echo $this->template->render('signup.html');
    }

}
