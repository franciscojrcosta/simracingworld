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
 * Description of AuthModel
 * @version 0.0.1B
 * @author Francisco Costa
 */
class AuthModel extends Model {

    public $activationkey;
    public $hashedpassword;
    public $validlogin;
    public $active;
    public $username;
    public $email;
    protected $password;

    /**
     * Generates the unique id for the activation key
     * @return string Sactivationkey
     */
    public function generateActivationKey() {
        $this->activationkey = uniqid();
        return $this->activationkey;
    }

    /**
     * @param string $accounttype account can be for a racer, a team or organization
     * @param string $email the email of the account to be activated
     * @param string $key the generated key to activate account
     * sends an e-mail to the destination with the activation key
     */
    public function sendActivationKey($email, $key) {
        $smtphost = $this->f3->get('SMTP_HOST'); /* the SMTP_parameters ared defined in config.ini */
        $smtpmode = $this->f3->get('SMTP_MODE');
        $smtpport = $this->f3->get('SMTP_PORT');
        $smtpuser = $this->f3->get('SMTP_USER');
        $smtppass = $this->f3->get('SMTP_PASS');
        $smtpfrom = $this->f3->get('SMTP_FROM');
        $smtperrs = $this->f3->get('SMTP_ERRS');
        $smtp = new SMTP($smtphost, $smtpport, $smtpmode, $smtpuser, $smtppass);
        $smtp->set('Errors-to', $smtperrs);
        $smtp->set('To', $email);
        $smtp->set('From', $smtpfrom);
        $smtp->set('Subject', 'SimRacingWorld Activation Key');
        $smtp->set('Content-type', 'text/html; charset=iso-8859-1');
        $siteroot = $this->f3->get('SITEROOT');
        $message = $this->f3->get('ACTIVATIONEMAIL');
        $link = '<a href=' . $siteroot . '/racers/activate/' . $email . '/' . $key . '>Click here to activate account!</a>';
        $smtp->send($message . '<center><h3>' . $link . '</h3></center>' . '<center><h3>' . $key . '</h3></center>');
        //echo '<pre>'.$smtp->log().'</pre>';
    }

    /**
     * Checks user e-mail
     * Checks user password
     * Checks if user is active
     * Returns loginvalid
     * Sets Messages to display if login is not ok
     */
    public function login() {
        $this->email = filter_input(INPUT_POST, 'email');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->dbdata->load(array('email=?', $this->email));
        if ($this->dbdata->dry()) { // Check if there is any data loaded in racersdata
            $this->f3->set('loginMsg1', 'User does not exist. Register or try again!');
            $this->f3->set('loginMsg2', null);
            $this->f3->set('loginError', true);
            $this->validlogin = false;
            echo $this->template->render('login.html');
        }
        $this->passcheck = password_verify($this->password, $this->dbdata->password); // Checks the password
        if ($this->passcheck == false) {
            $this->f3->set('loginMsg1', null);
            $this->f3->set('loginMsg2', 'Incorrect password. Try again!');
            $this->f3->set('loginError', true);
            $this->validlogin = false;
            echo $this->template->render('login.html');
        }
        if ($this->dbdata->active == false) { // checks if racer is active
            $this->f3->set('loginMsg1', 'Your account is not active, please check your e-mail to activate account!');
            $this->f3->set('loginMsg2', null);
            $this->f3->set('loginError', true);
            $this->validlogin = false;
            echo $this->template->render('login.html');
        }
        if ($this->passcheck == true and $this->dbdata->active == true) {
            $this->dbdata->lastlogin = date("Y-m-d");
            $this->dbdata->save();
            $this->username = $this->dbdata->firstname . ' ' . $this->dbdata->lastname;
            $this->validlogin = true;
        }
        unset($this->dbdata);
        return $this->validlogin;
    }

    /**
     * Activates the user account by setting
     * the active in the db to true
     * @param type $email
     * @param type $key
     */
    public function activate($email, $key) {
        $this->dbdata->load(array('email=?', $email));
        if ($this->dbdata->activationkey == $key) {
            $this->dbdata->active = true;
            $this->dbdata->save();
            $this->active = true;
        } else {
            $this->active = false;
        }
        unset($this->dbdata);
    }

     /**
     * generates a random string to be used as recovery password
     * @return string
     */
    public function randomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
    
    /**
     * @param string $accounttype account can be for a racer, a team or organization
     * @param string $email the email of the account to be activated
     * @param string $key the generated key to activate account
     * sends an e-mail to the destination with the activation key
     */
    public function sendNewPassword($email, $password) {
        $smtphost = $this->f3->get('SMTP_HOST'); /* the SMTP_parameters ared defined in config.ini */
        $smtpmode = $this->f3->get('SMTP_MODE');
        $smtpport = $this->f3->get('SMTP_PORT');
        $smtpuser = $this->f3->get('SMTP_USER');
        $smtppass = $this->f3->get('SMTP_PASS');
        $smtpfrom = $this->f3->get('SMTP_FROM');
        $smtperrs = $this->f3->get('SMTP_ERRS');
        $smtp = new SMTP($smtphost, $smtpport, $smtpmode, $smtpuser, $smtppass);
        $smtp->set('Errors-to', $smtperrs);
        $smtp->set('To', $email);
        $smtp->set('From', $smtpfrom);
        $smtp->set('Subject', 'SimRacingWorld Password Reset');
        $smtp->set('Content-type', 'text/html; charset=iso-8859-1');
        $siteroot = $this->f3->get('SITEROOT');
        $message = $this->f3->get('PASSRESETEMAIL');
        $smtp->send($message . '<center><h3>' . $password . '</h3></center>');
        //echo '<pre>'.$smtp->log().'</pre>';
    }
    
}
