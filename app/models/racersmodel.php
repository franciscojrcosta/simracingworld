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
    public $raceractive;

    public function __construct() {
        parent::__construct();
        $this->mapDb();
    }

    /**
     * Maps database table racers to object racersdata
     */
    protected function mapDb() {
        $racersdata = new DB\SQL\Mapper($this->srwdatabase, 'racers');
        $this->racersdata = $racersdata;
    }

    public function signup() {
        $signup = new RacersSignup();
        $signup->initSignup();
    }
    
    
    public function setPassword($password){
        
    }
            

    /**
     * 
     */
    public function getByEmail($email) {
        $this->racersdata->load(array('email=?', $email));
        if ($this->racersdata->dry()) {
            $this->racersdata = false;
            return $this->racersdata;
        } else {
            return $this->racersdata;
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
