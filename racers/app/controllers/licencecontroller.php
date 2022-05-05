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
 * Description
 *
 * @author franc
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
        print_r($licencedata);
        $this->f3->set('availablelicences', array('op1', 'op2', 'op3', 'op4'));
    }

}
