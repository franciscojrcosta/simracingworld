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
    protected $passcheck;

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
    
    /**
     * 
     */
    public function getRacersData($email){
       $this->racersdata->load(array('email=?', $email));
       if($this->racersdata->dry){
           echo 'Error on class RacersModel function getRacersData could not load any data';
       } else {
           $_SESSION['email'] = $this->racersdata->email;
           /* continue loading data into SESSION */
       }
    }
    
    
    /**
     * Checks user e-mail
     * Checks user password
     * Returns loginvalid
     */
    public function loginRacers() {
        $this->email = filter_input(INPUT_POST, 'email');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->racersdata->load(array('email=?', $this->email));
        if ($this->racersdata->dry()) {
            $this->f3->set('loginMsg1', 'User does not exist. Register or try again!');
            $this->f3->set('loginMsg2', NULL);
            $this->f3->set('loginError', true);
            echo $this->template->render('racers/login.html');
        }
        $this->passcheck = password_verify($this->password, $this->racersdata->password);
        if ($this->passcheck == false) {
            $this->f3->set('loginMsg1', NULL);
            $this->f3->set('loginMsg2', 'Incorrect password. Try again!');
            $this->f3->set('loginError', true);
            echo $this->template->render('racers/login.html');
        }
        if ($this->passcheck == true) {
            $validlogin = true;
            return $validlogin;
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
