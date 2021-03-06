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
 * Handles all the actions from racers
 * 
 */
class Racers extends Controller {

    protected $racersmodel; //!object Racers Model
    protected $racersauth;
    protected $racers;
    protected $validlogin;

    public function __construct() {
        parent::__construct();
        $this->racersmodel = new RacersModel();
        $this->racersauth = new RacersAuth();
    }

    /**
     * Keeping the session alive between every routing
     * 
     */
    public function beforeroute() {
        session_start();
    }

    public function goToIndex() {
        echo $this->template->render('main.html');
        exit;
    }

    /**
     * starts the login process
     */
    public function login() {
        $this->validlogin = $this->racersauth->login();
        if ($this->validlogin == true) {
            session_start();
            $_SESSION['id'] = session_id();
            $this->f3->set('sessionid', $_SESSION['id']);
            $this->dashboard(); //open dashboard
        }
    }

    /**
     * shows and loads data to racer dashboard
     * checks if session id exists and render the page
     * if session id doesnt exist render the main page
     */
    public function dashboard() {
        if (!isset($_SESSION['id'])) {
            $this->goToIndex(); //!render the main page
        } else {
            $this->f3->set('sessionid', $_SESSION['id']);
            echo $this->template->render('racers/dashboard.html');
            }
    }

    /**
     * shows and loads data to racer license
     */
    public function license() {
        if (!isset($_SESSION['id'])) {
            $this->goToIndex();
        } else {
            $this->f3->set('sessionid', $_SESSION['id']);
            echo $this->template->render('racers/license.html');
        }
    }

    /**
     * destroys session and logout the racer
     */
    public function logout() {
        session_destroy();
        echo $this->template->render('main.html');
        exit;
    }

    /**
     * starts a new racer registration
     */
    public function register() {
        $this->racersmodel->signup();
        echo $this->template->render('racers/activate.html');
    }

}
