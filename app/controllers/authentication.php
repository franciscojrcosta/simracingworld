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
    public function loginRacer(){
        $this->f3->set('loginMsg1','');
        $this->f3->set('loginMsg2','');
        $this->f3->set('loginError',NULL);
        echo $this->template->render('racers/login.html');
    }
    
    /**
     * show racer signup page
     */
    public function signupRacer(){
        echo $this->template->render('racers/signup.html');
    }
    
    /**
     * show teams login page
     */
    public function loginTeam(){
        echo $this->template->render('teams/login.html');
    }
    
    /**
     * show teams sigup page
     */
    public function signupTeam(){
        echo $this->template->render('teams/signup.html');
    }
    
    public function activateAccount(){
        $user = $this->f3->get('PARAMS.user');
        $key = $this->f3->get('PARAMS.key');
        $racermodel = new RacersModel();
        $racermodel->getRacersByEmail($user);
    }
}
