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
 * Description of RacersModel
 *
 * @author franc
 */
class RacersModel extends Model {

    protected $racersdata; //! Database object for table racers
    protected $email;
    protected $password;
    protected $firstname;
    protected $middlename;
    protected $lastname;
    protected $birthdate;
    protected $registrationdate;
    protected $nationality;
    protected $flag;
    protected $activationkey;
    protected $active;

    public function __construct() {
        parent::__construct();
        $this->mapRacers();
    }

    /**
     * Maps database table racers to object racersdata
     */
    protected function mapRacers() {
        $racersdata = new DB\SQL\Mapper($this->srwdatabase, 'racers');
        $this->racersdata = $racersdata;
    }

    public function signupRacers() {
        $signup = new RacersSignup();
        $signup->initSignup();
    }

    public function loginRacers() {
        $this->email = filter_input(INPUT_POST, 'email');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->racersdata->load(array('email=?', $this->email));
        if ($this->racersdata->dry()) {
            echo 'No user was found';
        } else {
            $passcheck = password_verify($this->password, $this->racersdata->password);
        }
        if ($passcheck == false) {
            echo 'password errada';
        }
        if ($passcheck == true) {
            echo 'password correta';
        }
    }

    protected function create() {
        
    }

    protected function read() {
        
    }

    protected function update() {
        
    }

    protected function delete() {
        
    }

    protected function getByField($id) {
        $this->load(array('RacerId=?', $id));
        print_r($this->query);
        return $this->query;
    }

}
