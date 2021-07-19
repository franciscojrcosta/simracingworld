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
 * Handles all the authentication for racer and teams
 *
 * @author franc
 */
class Authentication extends Controller {

    /**
     * set initial messages
     * shows racer login page
     */
    public function loginRacer() {
        $this->f3->set('loginMsg1', '');
        $this->f3->set('loginMsg2', '');
        $this->f3->set('loginError', NULL);
        echo $this->template->render('racers/login.html');
    }

    /**
     * show racer signup page
     */
    public function signupRacer() {
        echo $this->template->render('racers/signup.html');
    }

    /**
     * show teams login page
     */
    public function loginTeam() {
        echo $this->template->render('teams/login.html');
    }

    /**
     * show teams sigup page
     */
    public function signupTeam() {
        echo $this->template->render('teams/signup.html');
    }

    /**
     * will activate the account for
     * Racers or teams or organizations
     * check the activation code and e-mail
     */
    public function activateAccount() {
        $accounttype = $this->f3->get('PARAMS.accounttype');
        $user = $this->f3->get('PARAMS.user');
        $key = $this->f3->get('PARAMS.key');
        switch ($accounttype) {
            case 'racers':
                $racersauth = new RacersAuth();
                $racersauth->activate($user, $key);
                if ($racersauth->raceractive == true) {
                    echo $this->template->render('racers/activateconfirm.html');
                } else {
                    echo $this->template->render('racers/activatenegative.html');
                }
                break;
            case 'teams':
                echo 'authentication - func activateAccount for teams';
                break;
            case 'organizations':
                echo 'authentication - func activateAccount for organizations';
                break;
        }
    }
    
    /**
     * Checks if the e-mail exists in the database
     * send text response to XMLHttpRequest that comes from signup.html
     * echo FALSE if e-mail is not found in DB
     * echo TRUE if e-mail is found in DB
     */
    public function checkRacerEmail() {
        $racermodel = new RacersModel();
        $email = $this->f3->get('PARAMS.email');
        $racerdata = $racermodel->getByEmail($email);
        if ($racerdata == false) {
            echo 'FALSE';
        } else {
            echo 'TRUE';
        }
    }

}
