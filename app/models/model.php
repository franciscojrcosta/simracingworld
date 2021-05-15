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
 *
 * @author franc
 */
class Model {

    protected $fatfree;     //! Framework Instance
    protected $srwdatabase; //! Database Instance

    public function __construct() {
        $f3 = Base::instance();
        $this->fatfree = $f3;
        $this->connectMySQL();
    }

    protected function connectMySQL() {
        $srwdatabase = new DB\SQL(
                $this->fatfree->get('SYSDB'), //key SYSDB is at config.ini
                $this->fatfree->get('DBUSERNAME'), //key DBUSERNAME is at config.ini
                $this->fatfree->get('DBPASSWORD')); //key DBPASSWORD is at config.ini
        $this->srwdatabase = $srwdatabase;
    }

}
