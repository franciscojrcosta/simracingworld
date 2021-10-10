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
 * Description of Model
 * @version 0.0.1C
 * @author Francisco Costa
 */
class Model {

    protected $f3;          //! Framework Instance
    protected $srwdatabase; //! Database Instance
    protected $template;    //! Template Instance
    protected $dbdata;      //! Table Object

    /**
     * set the framework instance $f3
     * set the template instance $template
     */
    public function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->template = new Template();
        $this->connectMySQL();
        $this->mapDB();
    }

    /**
     * Maps database table racers to object racersdata
     */
    protected function mapDB() {
        $dbdata = new DB\SQL\Mapper($this->srwdatabase, 'racers');
        $this->dbdata = $dbdata;
    }

    /**
     * Connects to MySQL database
     * SYSDB, DBUSERNAME, DBPASSWORD are in the config.ini
     */
    protected function connectMySQL() {
        $srwdatabase = new DB\SQL(
                $this->f3->get('SYSDB'), //key SYSDB is at config.ini
                $this->f3->get('DBUSERNAME'), //key DBUSERNAME is at config.ini
                $this->f3->get('DBPASSWORD')); //key DBPASSWORD is at config.ini
        $this->srwdatabase = $srwdatabase;
    }
    
    /**
     * gets data from database 
     */
    public function getByEmail($email) {
        $this->dbdata->load(array('email=?', $email));
        if ($this->dbdata->dry()) {
            $this->dbdata = false;
            return $this->dbdata;
        } else {
            return $this->dbdata;
        }
    }

}
