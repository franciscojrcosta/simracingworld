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
 * NOTE: the function doLogin is at Racers Controller in order to start_session
 * to work and the correct path being used in links inside racers app.
 * @author franc
 */
class AuthRacersCtrl extends AuthCtrl {

    protected $racersauthmod; //! object RacersAuthMod

    function __construct() {
        parent::__construct();
        $this->authracers = new AuthRacers();
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

    public function showSignup() {
        echo $this->template->render('signup.html');
    }


    public function doSignup() {
        
    }

    public function forgotPassword() {
        
    }

    public function activateAccount() {
        
    }

}
