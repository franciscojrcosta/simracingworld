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
 * Description of LicenceModel
 *
 * @author franc
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
