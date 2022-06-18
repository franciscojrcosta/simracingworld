<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
 */
class ProfileModel extends Model {

    protected $profiledata; /* Database object for database table */
    protected $email;
    public $profile;

    public function __construct() {
        parent::__construct();
        $this->mapDbTable('pilots');
        $this->profiledata = $this->dbdata;
        $this->email = $this->f3->get('email');
        $this->readCurrentProfile();
    }

    /**
     * Get the data for the current profile by the e-mail
     * email is set in f3 global variable email in the views.php in checkSession
     */
    protected function readCurrentProfile() {
        $this->profiledata->load(array('email=?', $this->email));
        $this->profile['email'] = $this->profiledata->email;
        $this->profile['firstname'] = $this->profiledata->firstname;
        $this->profile['middlename'] = $this->profiledata->middlename;
        $this->profile['lastname'] = $this->profiledata->lastname;
        $this->profile['birthdate'] = $this->profiledata->birthdate;
        $this->profile['photo'] = $this->profiledata->photo;
        $this->profile['nationality'] = $this->profiledata->nationality;
        $this->profile['flag'] = $this->profiledata->flag;
    }

    protected function readOne() {
        
    }

    protected function readXRandomly() {
        
    }

    protected function readCurrent() {
        
    }

}
