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
 * Description of AuthController
 *
 * * 
 * @author franc
 */
class AuthCtrl extends Controller {

    public function activateAccount() {
        $accounttype = $this->f3->get('PARAMS.accountype');
        $email = $this->f3->get('PARAMS.email');
        $key = $this->f3->get('PARAMS.key');
        switch ($accounttype) {
            case 'racers':
                $authracers = new AuthRacers();
                $authracers->activate($email, $key);
                if($authracers->raceractive == true){
                    echo $this->template->render('activateconfirm.html');
                } else {
                    echo $this->template->render('activatenegative.html');
                }
                break;
            case 'teams':
                echo 'Teams activation';
                break;
        }
    }

}
