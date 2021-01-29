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

class Drivers extends DB\SQL\Mapper{

    public function __construct(\DB\SQL $db) {
        parent::__construct($db, 'drivers');
    }
    
    private function insertDriver(){
        
    }
    
    

    public function getByID($id){
        $this->load(array('driverid=?',$id));
        return $this->query;
    }
   
}