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

    protected $f3;          //! fat-free framework instance
    protected $template;    //! template instance
    protected $authmodel;
    protected $validsession;

    /**
     * Initialize Template object
     * Initialize Framework object
     */
    public function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->template = new Template;
        $this->authmodel = new AuthModel;
    }

    /**
     * starts the login process
     * sets session id, user and session type
     */
    public function doLogin() {
        if ($this->authmodel->login() == true) {
            session_start();
            $_SESSION['id'] = session_id();
            $_SESSION['user'] = $this->authmodel->username;
            $_SESSION['email'] = $this->authmodel->email;
            $this->f3->set('sessionid', $_SESSION['id']);
            $this->f3->set('username', $_SESSION['user']);
            $this->f3->set('email', $_SESSION['email']);
            $this->f3->set('timedate', date('d-m-Y H:m:s'));
            echo $this->template->render('dashboard.html'); //open dashboard
        }
    }

}