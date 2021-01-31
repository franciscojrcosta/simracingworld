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
 * Driver will be registered at the app
 */
class Registration extends Controller {

    private $driverdata;
    private $activationid;

    public function register() {
        $this->filterData();
        $this->encodePassword();
        echo $this->setActivationKey();
    }

    /**
     * Filter and sanitize data from registration form
     * @
     */
    private function filterData() {
        $myfilter = array(
            'txtemail' => FILTER_SANITIZE_EMAIL,
            'txtpassword' => FILTER_SANITIZE_STRING,
            'txtfirstname' => FILTER_SANITIZE_STRING,
            'txtmiddlename' => FILTER_SANITIZE_STRING,
            'txtbirthdate' => FILTER_SANITIZE_STRING,
            'txtnationality' => FILTER_SANITIZE_STRING,
        );
        $this->driverdata = filter_input_array(INPUT_POST, $myfilter); //data from signup form
    }

    private function encodePassword() {
        $encodedpass = password_hash($this->driverdata['txtpassword'], PASSWORD_DEFAULT);
        $this->driverdata['txtpassword'] = $encodedpass;
    }

    private function setActivationKey() {
        $this->activationid = uniqid();
        return $this->activationid;
    }

    private function verifyActivationKey() {
        
    }

    private function writeDriverData() {
    
    }

}
