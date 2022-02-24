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
 * Description of contracts
 *
 * @author franc
 */
class SponsorContract extends SponsorModel{
    
    protected $minvalue;
    protected $maxvalue;
    protected $minmonths;
    protected $maxmonths;
    protected $racer;
    protected $team;
    public $startdate;
    public $enddate;
    public $contractvalue;
    public $sponsor;

    public function __construct() {
        parent::__construct();
    
    }
    
    
    public function createContract(){
        
    }
    
    public function deleteContract(){
        
    }
    
    
    /**
     *  Generates a value for the contract
     */
    public function generateContractValue() {
        $this->minvalue = 1000;
        $this->maxvalue = 30000;
        $this->contractvalue = rand($this->minvalue, $this->maxvalue);
    }
    
    /**
     * Generates a number of months for the contract duration
     */
    public function generateContractDays() {
        $this->minmonths = 1;
        $this->maxmonths = 6;
        $months = rand($this->minmonths, $this->maxmonths);
        $this->startdate = date('Y-m-d'); // current date at UTC
        $datetime = new DateTime(date('Y-m-d'));        
        $datetime->add(new DateInterval('P'.$months.'M')); // adding period of time to current date
        $this->enddate = $datetime->format('Y-m-d');
    }
    
}
