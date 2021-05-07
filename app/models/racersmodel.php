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

class RacersModel extends Model {
            
    public function __construct(\DB\SQL $db) {
        parent::__construct($db, 'racers');
    }
    
    
    protected function create() {

    }

    protected function read() {
        
    }
    
    protected function update(){
        
    }

    protected function delete() {
        
    }

    protected function getByField($id) {
        $this->load(array('RacerId=?', $id));
        print_r($this->query);
        return $this->query;
    }

}
