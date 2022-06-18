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
        $this->profiledata = $this->profilemodel->profile;
    }
    
}