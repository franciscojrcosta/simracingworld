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

class Views extends Controller {

    protected $section;
    protected $page;
    protected $pagetorender;

    public function beforeroute() {
    
    }

    public function afterroute() {
        //echo '- After routing';
    }

    public function viewMain() {
        echo $this->template->render('main.html');
    }

    /**
     * Render the page
     */
    public function viewPage() {
        $this->section = $this->f3->get('PARAMS.section');
        $this->page = $this->f3->get('PARAMS.page');
        $this->pagetorender = $this->section . '/' . $this->page;
        echo $this->template->render($this->pagetorender . '.html');
    }

}
