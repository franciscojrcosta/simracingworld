<?php

/**
 * a Class that renders pages
 */

class ShowPages extends Controller {
    
    function showNav() {
        echo $this->template->render('navigation.html');
    }

    function showSignup() {
        echo $this->template->render('signup.html');
    }

    function showDashboard() {
        echo $this->template->render('dashboard.html');
    }

}
