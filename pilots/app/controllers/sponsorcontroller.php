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
 * Description of SponsorController
 *
 * @author franc
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

    public function listAll() {
        print_r($this->sponsormodel->sponsorlist);
    }

    public function listOne() {
        
    }

    public function listCurrentSponsor() {
        
    }

    public function listRandomSponsor() {
        
    }

    public function contract() {
        $this->sponsormodel->generateContractValue();
        $this->sponsormodel->generateContractDays();
        echo '<p>contract value ' . $this->sponsormodel->contractvalue . '</p>';
        echo '<p>contract start ' . $this->sponsormodel->startdate . '</p>';
        echo '<p>contract end ' . $this->sponsormodel->enddate . '</p>';
    }

}
