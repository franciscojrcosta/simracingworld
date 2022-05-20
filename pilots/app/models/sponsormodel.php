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
class SponsorModel extends Model {

    protected $sponsordata; //! Database object for table Sponsorso
    protected $minvalue;
    protected $maxvalue;
    protected $minmonths;
    protected $maxmonths;
    public $startdate;
    public $enddate;
    public $contractvalue;
    public $sponsorlist;

    public function __construct() {
        parent::__construct();
        $this->mapDbTable('sponsors');
        $this->sponsordata = $this->dbdata;
        $this->getAll();    
    }

    /**
     * Loads all sponsor data in to sponsordata
     */
    protected function getAll() {
        $this->sponsordata->load();
        $pos = 0;
        while ($this->sponsordata->dry() == false) {
            $this->sponsorlist[$pos] = array(
                'brandname' => $this->sponsordata->brandname,
                'logo' => $this->sponsordata->logo);
            $this->sponsordata->next();
            $pos++;
        }
    }

    protected function getOne() {
        
    }

    protected function getXRandomly(){
        
    }
    
    protected function getCurrent(){
        
    }
}
