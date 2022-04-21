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
 * Description of racerssignup
 *
 * @author franc
 */
class SignupModel extends Model {
    
    private $authmodel;
            
    public function __construct() {
        parent::__construct();
        $this->authmodel = new AuthModel();
    }
    
    public function initSignup(){
        $this->initData();
        $this->register();
        $this->authmodel->sendActivationKey($this->email, $this->activationkey);
    }
    
    /**
     * initializes data from data received from registration form
     * encrypt the password
     * generates an activation token
     */
    protected function initData() {
        $this->email = filter_input(INPUT_POST, 'email');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->firstname = filter_input(INPUT_POST, 'firstname');
        $this->middlename = filter_input(INPUT_POST, 'middlename');
        $this->lastname = filter_input(INPUT_POST, 'lastname');
        $this->birthdate = filter_input(INPUT_POST, 'birthdate');
        $this->registrationdate = date("Y-m-d");
        $this->nationality = filter_input(INPUT_POST, 'nationality');
        $this->flag = strtolower($this->nationality).".png";
        $this->photo = "generic.jpg";
        $this->active = false;
        $this->activationkey = $this->authmodel->generateActivationKey(); /*Generates activation key */
        $this->password = $this->authmodel->encryptPassword($this->password); /*Encrypts the password */
    }
    
    /**
     * Saves the data
     */
    protected function register() {
        $this->dbdata->email        = $this->email;
        $this->dbdata->password     = $this->password;
        $this->dbdata->firstname    = $this->firstname;
        $this->dbdata->middlename   = $this->middlename;
        $this->dbdata->lastname     = $this->lastname;
        $this->dbdata->birthdate    = $this->birthdate;
        $this->dbdata->registrationdate = $this->registrationdate;
        $this->dbdata->nationality  = $this->nationality;
        $this->dbdata->flag         = $this->flag;
        $this->dbdata->photo        = $this->photo;
        $this->dbdata->active       = $this->active;
        $this->dbdata->activationkey= $this->activationkey;
        $this->dbdata->save(); //saves all the data to db
        $this->dbdata->reset(); //clean up the stored variables and prepares for new data
    }
    
}
