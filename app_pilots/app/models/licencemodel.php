<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
 */
class LicenceModel extends Model {

    public $licencedata; //! Database object for database table
    protected $email;
    protected $licences; //! Array of available licences for subscription

    public function __construct() {
        parent::__construct();
        $this->mapDbTable('licences');
        $this->licencedata = $this->dbdata;
    }

    protected function getCurrent() {
        
    }
    
    function getAvailableLicences(){
        $this->licencedata->load();
        $pos = 0;
        while($this->licencedata->dry() == FALSE){
            $availablelicences[$pos] = array(
                'licencetype' => $this->licencedata->description,
                'licenceprice' => $this->licencedata->dailyprice);
            $pos++;
            $this->licencedata->next();
        }
       $this->licences = $availablelicences;
       return $this->licences;
    }

}
