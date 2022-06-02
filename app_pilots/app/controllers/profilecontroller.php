<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Controllers
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