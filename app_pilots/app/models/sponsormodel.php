<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
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
