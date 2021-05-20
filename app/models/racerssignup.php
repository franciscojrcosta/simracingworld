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
class RacersSignup extends RacersModel {
       
    public function initSignup(){
        $this->initRacerData();
        $this->register();     
    }
            
    protected function initRacerData() {
        $encryptation = new SRW_PassEnc();
        $this->email = filter_input(INPUT_POST, 'email');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->firstname = filter_input(INPUT_POST, 'firstname');
        $this->middlename = filter_input(INPUT_POST, 'middlename');
        $this->lastname = filter_input(INPUT_POST, 'lastname');
        $this->birthdate = filter_input(INPUT_POST, 'birthdate');
        $this->registrationdate = date("Y-m-d");
        $this->nationality = filter_input(INPUT_POST, 'nationality');
        $this->flag = strtolower($this->nationality).".png";
        $this->activationkey = $encryptation->genActivationKey();
        $this->active = false;
        $this->password = $encryptation->encryptPassword($this->password);
    }
    
    protected function register() {
        $this->racersdata->email        = $this->email;
        $this->racersdata->password     = $this->password;
        $this->racersdata->firstname    = $this->firstname;
        $this->racersdata->middlename   = $this->middlename;
        $this->racersdata->lastname     = $this->lastname;
        $this->racersdata->birthdate    = $this->birthdate;
        $this->racersdata->registrationdate = $this->registrationdate;
        $this->racersdata->nationality  = $this->nationality;
        $this->racersdata->flag         = $this->flag;
        $this->racersdata->activationkey= $this->activationkey;
        $this->racersdata->save(); //saves all the data to db
        $this->racersdata->reset(); //clean up the stored variables and prepares for new data
    }
    
}
