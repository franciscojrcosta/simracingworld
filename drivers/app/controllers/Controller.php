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

//! Base Controller
class Controller {

    protected $f3; //! framework instance
    protected $db; //! database instance
    protected $template; //! template instance

    /**
     * Initialize the framework f3 object
     * Initialize Template object
     * Initialize db object MySQL database
     */
    public function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->template = new Template;
        $this->connectMySQL();
    }

    /**
     * Connects to MySQL dabtabase
     * @return $db object
     */
    public function connectMySQL() {
        $db = new DB\SQL(
                $this->f3->get('SYSDB'),
                $this->f3->get('DBUSERNAME'),
                $this->f3->get('DBPASSWORD'));
        //'mysql:host=localhost;port=3306;dbname=simracingworld',
        //'root',
        //'Redbaron');
        $this->db = $db;
    }

    public function beforeroute() {
        //echo 'Before routing - ';
    }

    public function afterroute() {
        //echo '- After routing';
    }

}
