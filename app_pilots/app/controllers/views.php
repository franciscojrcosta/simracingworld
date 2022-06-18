<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Controllers
 */
class Views extends Controller {

    protected $page;
    protected $sponsorcontroller;
    protected $profilecontroller;
    protected $licencecontroller;

    public function beforeroute() {
        session_start();
    }

    public function afterroute() {
        //echo '- After routing';
    }
    
    /**
     * Return true if session is set
     * Sets global F3 framework variables
     * variable sessionid
     * variable username
     * variable email
     * variable timeanddate
     * @return type
     */
    private function checkSession() {
        if (!isset($_SESSION['id'])) {
            $this->validsession = false;
        } else {
            $this->f3->set('sessionid', $_SESSION['id']);
            $this->f3->set('username', $_SESSION['user']);
            $this->f3->set('email', $_SESSION['email']);
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

    public function licences() {
        if ($this->checkSession() == false) {
            echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
        } else {
            $this->licencecontroller = new LicenceController;
            $this->licencecontroller->getAvailableLicences();
            echo $this->template->render('licences.html');
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
            $this->sponsorcontroller = new SponsorController;
            $this->sponsorcontroller->getAll();
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
            $email = $this->f3->get('email');
            $this->profilecontroller = new ProfileController();
            $this->f3->set('profiledata', $this->profilecontroller->profiledata);
            echo $this->template->render('profile.html');
        }
    }

    public function logout() {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0; URL=http://' . $this->f3->get('SITEROOT') . '"/>';
    }

}
