<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Controllers
 */
class LicenceController extends Controller {

    protected $licencemodel;

    public function __construct() {
        parent::__construct();
        $this->licencemodel = new LicenceModel();
    }

    public function listCurrentLicence() {
        print_r($this->licencemodel->getCurrent());
    }

    //https://www.w3programmers.com/views-and-templates-of-fat-free-framework/
    public function listAvailableLicences() {
        $licencedata = $this->licencemodel->getAvailableLicences();
        $this->f3->set('availablelicences', $licencedata);
    }
    
    public function buyLicence(){
        $teste = filter_input(INPUT_POST, 'txtoutput_form');
        echo 'Porreta - '.$teste;
    }

}
