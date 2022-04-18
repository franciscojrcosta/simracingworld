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
 * Description of SponsorController
 *
 * @author franc
 */
class ProfileController extends Controller {

    protected $profilemodel;
    public $profiledata;
    

    public function __construct() {
        parent::__construct();
        $this->profilemodel = new ProfileModel();
        $this->profiledata = $this->profilemodel->profiledata;
        /*
        $this->profiledata['email'] = $this->profilemodel->profiledata->email;
        $this->profiledata['firstname'] = $this->profilemodel->profiledata->firstname;
        $this->profiledata['lastname'] = $this->profilemodel->profiledata->lastname;
        $this->profiledata['birthdate'] = $this->profilemodel->profiledata->birthdate; */
    }
    
}