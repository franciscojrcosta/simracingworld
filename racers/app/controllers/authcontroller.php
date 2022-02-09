<?php

/*
 * Copyright (C) 2021 SimRacingWorld by Francisco Costa
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of AuthController
 *
 * * 
 * @author franc
 */
class AuthController extends Controller {

    protected $authmodel;

    public function __construct() {
        parent::__construct();
        $this->authmodel = new AuthModel();
    }

    /**
     * set initial messages
     * shows racer login page
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
        echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
    }

    /**
     * Checks if the e-mail exists in the database
     * send text response to XMLHttpRequest that comes from signup.html
     * echo FALSE if e-mail is not found in DB
     * echo TRUE if e-mail is found in DB
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