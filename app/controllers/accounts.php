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
class Accounts extends Controller {

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

    public function forgotpass() {
        $accounttype = $this->f3->get('PARAMS.accounttype');
        echo $accounttype;
        echo $this->randomString();
    }

    /**
     * generates a random string to be used as recovery password
     * @return string
     */
    protected function randomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

}
