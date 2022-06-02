<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
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
