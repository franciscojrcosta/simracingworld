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

    protected $page;
    protected $sponsorcontroller;
    
    public function beforeroute() {
        session_start();
    }

    public function afterroute() {
        //echo '- After routing';
    }

    /* DEPRECATED
      public function viewMain() {
      echo $this->template->render('main.html');
      }

      DEPRECATED
      public function viewPage() {
      $this->page = $this->f3->get('PARAMS.page');
      echo $this->template->render($this->page . '.html');
      }
     */

    private function checkSession() {
        if (!isset($_SESSION['id'])) {
            $this->validsession = false;
        } else {
            $this->f3->set('sessionid', $_SESSION['id']);
            $this->f3->set('username', $_SESSION['user']);
            $this->f3->set('timedate', date("d-M-Y H:i:s"));
            $this->validsession = true;
        }
        return $this->validsession;
    }

    public function dashboard() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            echo $this->template->render('dashboard.html');
        }
    }

    public function mailbox() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            echo 'Mailbox';
        }
    }

    public function licenses() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            echo 'LICENSAS';
        }
    }

    public function teams() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            echo 'TEAMS';
        }
    }

    public function sponsors() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            $this->sponsorcontroller = new SponsorsController;
            $this->sponsorcontroller->listAll();
           //echo $this->template->render('sponsors.html');
        }
    }

    public function finances() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            echo 'FINANCES';
        }
    }

    public function championships() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            echo 'CHAMPIONSHIPS';
        }
    }

    public function profile() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            echo 'PROFILE';
        }
    }

    public function logout() {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
    }

}
