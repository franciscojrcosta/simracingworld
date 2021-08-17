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

    
    /**
     * Generates the unique id for the activation key
     * @return string Sactivationkey
     */
    public function generateActivationKey() {
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
        $link = '<a href='.$siteroot.'/activate/'.$accounttype.'/'.$email.'/'.$key.'>Click here to activate account!</a>';
        $smtp->send($message.'<center><h3>'.$link.'</h3></center>'.'<center><h3>'.$key.'</h3></center>');
        //echo '<pre>'.$smtp->log().'</pre>';
    }

}
