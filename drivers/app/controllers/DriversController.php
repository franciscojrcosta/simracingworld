<?php

/**
 * 
 */ 

class DriversController extends Controller {
    
    protected $driverID, $email, $password, $firstname, $middlename, $lastname,
            $nationality, $flag, $lastlogin, $birthdate, $photo, $simulators,
            $bakroll, $skill, $attacking, $defending, $reliability, $teamplayer,
            $fairplay, $knowledge, $evalcounter, $active;

    function render($f3) {
       $template = new Template;
       echo $template->render('login.html');
    }

}
