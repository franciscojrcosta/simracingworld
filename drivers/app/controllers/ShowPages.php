<?php

class ShowPages extends Controller {
    /*
      function render($f3){
      $f3->set('name','world');
      $template=new Template;
      echo $template->render('template.html');
      }
     */
    
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
