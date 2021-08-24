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
 * 
 *
 * @author franc
 */
class AuthRacers extends AuthModel {

    public $validlogin;
    public $raceractive;
    protected $racersdata; // DB table object for racers

    public function __construct() {
        parent::__construct();
        $this->racersdata = new DB\SQL\Mapper($this->srwdatabase, 'racers');
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
            $this->validlogin = false;
            echo $this->template->render('racers/login.html');
        }
        if ($this->racersdata->active == false) { /* checks if racer is active */
            $this->f3->set('loginMsg1', 'Your account is not active, please check your e-mail to activate account!');
            $this->f3->set('loginMsg2', null);
            $this->f3->set('loginError', true);
            $this->validlogin = false;
            echo $this->template->render('racers/login.html');
        }
        if ($this->passcheck == true and $this->racersdata->active == true) {
            $this->racersdata->lastlogin = date("Y-m-d");
            $this->racersdata->save();
            $this->user = $this->racersdata->email;
            $this->validlogin = true;
        }
        unset($this->racersdata);
        return $this->validlogin;
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
        unset($this->racersdata);
    }

}
