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
 * a Class that renders pages
 */
class ShowPages extends Controller {
        
    function showMain(){
        echo $this->template->render('main.html');
    }

    function showNav() {
        echo $this->template->render('navigation.html');
    }

    function driverSignup() {
        echo $this->template->render('dsignup.html');
    }

    function driverDashboard() {
        echo $this->template->render('ddashboard.html');
    }

    function driverLogin() {
        echo $this->template->render('dlogin.html');
    }

}
