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
class ProfileModel extends Model {

    public $profiledata; //! Database object for database table
    protected $email;

    public function __construct() {
        parent::__construct();
        $this->mapDbTable('racers');
        $this->profiledata = $this->dbdata;
        $this->email = $this->f3->get('email');
        $this->getCurrentProfile();
    }
    
    /**
     * Get the data for the current profile by the e-mail
     * email is set in f3 global variable email in the views.php in checkSession
     */
    protected function getCurrentProfile() {
        $this->profiledata->load(array('email=?', $this->email));
    }

    protected function getOne() {
        
    }

    protected function getXRandomly() {
        
    }

    protected function getCurrent() {
        
    }

}
