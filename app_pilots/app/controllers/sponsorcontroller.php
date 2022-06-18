<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Controllers
 */
class SponsorController extends Controller {

    protected $sponsormodel;

    public function __construct() {
        parent::__construct();
        $this->sponsormodel = new SponsorModel();
    }

    public function index() {
        echo $this->template->render('pilots/sponsor.html');
    }

    public function getAll() {
        print_r($this->sponsormodel->sponsorlist);
    }

    public function getOne() {
        
    }

    public function getCurrentSponsor() {
        
    }

    public function getRandomSponsor() {
        
    }

    public function contract() {
        $this->sponsormodel->generateContractValue();
        $this->sponsormodel->generateContractDays();
        echo '<p>contract value ' . $this->sponsormodel->contractvalue . '</p>';
        echo '<p>contract start ' . $this->sponsormodel->startdate . '</p>';
        echo '<p>contract end ' . $this->sponsormodel->enddate . '</p>';
    }

}
