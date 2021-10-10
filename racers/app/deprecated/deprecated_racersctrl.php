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
class dep_RacersCtrl extends Controller {

    protected $authracers;      //! object AuthRacers Model
    protected $racersmodel;     //! object Racers Model

    public function __construct() {
        parent::__construct();
        $this->racersmodel = new RacersModel();
        $this->authracers = new AuthRacers();
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
     * sets session id, user and session type
     */
    public function doLogin() {
        if ($this->authracers->login() == true) {
            session_start();
            $_SESSION['id'] = session_id();
            $_SESSION['user'] = $this->authracers->user;
            $_SESSION['type'] = 'racers';
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
            $this->f3->set('sessionuser', $_SESSION['user']);
            $this->f3->set('timedate', date("d-M-Y H:i:s"));
            echo $this->template->render('racers/dashboard.html');
        }
    }

    /**
     * shows and loads data to racer license
     */
    public function licenses() {
        if (!isset($_SESSION['id'])) {
            $this->goToIndex();
        } else {
            $this->f3->set('sessionid', $_SESSION['id']);
            echo $this->template->render('racers/licenses.html');
        }
    }

    /**
     *  show and loads sponsor list
     */
    public function sponsors() {
        if (!isset($_SESSION['id'])) {
            $this->goToIndex();
        } else {
            $this->f3->set('sessionid', $_SESSION['id']);
            $this->f3->set('user', $_SESSION['user']);
            $this->f3->set('type', $_SESSION['type']);
            $sponsors = new SponsorsModel();

            //echo $this->template->render('sponsors.html');
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

}