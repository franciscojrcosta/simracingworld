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

class Views {

    protected $pagetorender;

    function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->template = new Template;
        $pagetorender = 'main';
    }

    public function beforeroute() {
        //echo 'Before routing - ';
    }

    public function afterroute() {
        //echo '- After routing';
    }

    /**
     * Render the page at the parameter after /view/
     */
    public function viewPage() {
        $this->pagetorender = $this->f3->get('PARAMS.page');
        echo $this->template->render($this->pagetorender . '.html');
    }

}
