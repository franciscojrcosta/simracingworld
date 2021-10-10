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
 * Description of RacersModel
 *
 * @author franc
 */
class SponsorsModel extends Model {

    protected $sponsorsdata; //! Database object for table Sponsorso
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
        $this->mapDb();
        $this->listAllSponsors();
    }

    /**
     * Maps database table racers to object racersdata
     */
    protected function mapDb() {
        $sponsorsdata = new DB\SQL\Mapper($this->srwdatabase, 'sponsors');
        $this->sponsorsdata = $sponsorsdata;
    }

    protected function getSponsorConfig() {
        
    }

    protected function listAllSponsors() {
        
        $teste = $this->sponsorsdata->load();
        $teste2 = $this->sponsorsdata->next();
        print_r($teste);
        echo'<p>'.$teste->brandname.'</p>';
        echo '<p>';
        print_r($teste2);
        echo('</p>');
        
    }

}
