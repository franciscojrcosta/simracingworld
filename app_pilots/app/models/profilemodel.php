<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
 */
class ProfileModel extends Model {

    public $profiledata; /* Database object for database table */
    protected $email;

    public function __construct() {
        parent::__construct();
        $this->mapDbTable('pilots');
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
