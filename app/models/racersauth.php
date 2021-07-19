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
 * Description of RacersAuth
 *
 * @author franc
 */
class RacersAuth extends RacersModel {

    public $activationkey;
    public $hashedpassword;
    public $raceractive;

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
        $this->racersdata->load(array('email=?', $this->email));
        if ($this->racersdata->dry()) { /* Check if there is any data loaded in racersdata */
            $this->f3->set('loginMsg1', 'User does not exist. Register or try again!');
            $this->f3->set('loginMsg2', null);
            $this->f3->set('loginError', true);
            echo $this->template->render('racers/login.html');
        }
        $this->passcheck = password_verify($this->password, $this->racersdata->password); /* Checks the password */
        if ($this->passcheck == false) {
            $this->f3->set('loginMsg1', null);
            $this->f3->set('loginMsg2', 'Incorrect password. Try again!');
            $this->f3->set('loginError', true);
            echo $this->template->render('racers/login.html');
        }
        if ($this->racersdata->active == false) { /* checks if racer is active */
            $this->f3->set('loginMsg1', 'Your account is not active, please check your e-mail to activate account!');
            $this->f3->set('loginMsg2', null);
            $this->f3->set('loginError', true);
            echo $this->template->render('racers/login.html');
        }
        if ($this->passcheck == true and $this->racersdata->active == true) {
            $validlogin = true;
            return $validlogin;
        }
    }

    public function activate($email, $key) {
        $this->racersdata->load(array('email=?', $email));
        if ($this->racersdata->activationkey == $key) {
            $this->racersdata->active = true;
            $this->racersdata->save();
            $this->raceractive = true;
        } else {
            $this->raceractive = false;
        }
    }
    
    /**
     * Generates the unique id for the activation key
     * @return string Sactivationkey
     */
    public function genActivationKey() {
        $this->activationkey = uniqid();
        return $this->activationkey;
    }

    /**
     * Encrypts a given password
     * @param string $password original password to be encrypted
     * @return string $hashedpassword password after encryption
     */
    public function encryptPassword($password) {
        $this->hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->hashedpassword;
    }

    /**
     * @param string $accounttype account can be for a racer, a team or organization
     * @param string $email the email of the account to be activated
     * @param string $key the generated key to activate account
     * sends an e-mail to the destination with the activation key
     */
    public function sendActivationKey($accounttype, $email, $key) {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $smtphost = $this->f3->get('SMTP_HOST'); /*the SMTP_parameters ared defined in config.ini */
        $smtpmode = $this->f3->get('SMTP_MODE');
        $smtpport = $this->f3->get('SMTP_PORT');
        $smtpuser = $this->f3->get('SMTP_USER');
        $smtppass = $this->f3->get('SMTP_PASS');
        $smtp = new SMTP($smtphost,$smtpport,$smtpmode,$smtpuser,$smtppass);
        $smtp->set('Errors-to', 'zoom.franciscocosta@gmail.com');
        $smtp->set('To', $email);
        $smtp->set('From', 'slipstreamsims@gmail.com');
        $smtp->set('Subject', 'SimRacingWorld Activation Key');
        $smtp->set('Content-type', 'text/html; charset=iso-8859-1');
        $siteroot = $this->f3->get('SITEROOT');
        $message = $this->f3->get('ACTIVATIONEMAIL');
        $link = '<a href='.$siteroot.'/user/activate/'.$accounttype.'/'.$email.'/'.$key.'>Click here to activate account!</a>';
        $smtp->send($message.'<center><h3>'.$link.'</h3></center>'.'<center><h3>'.$key.'</h3></center>');
        //echo '<pre>'.$smtp->log().'</pre>';
    }

}
