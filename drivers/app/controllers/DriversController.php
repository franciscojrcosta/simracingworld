<?php

/**
 * 
 */

class DriversController extends Controller {
    
    protected $driverID;
    protected $email;
    password VARCHAR(254),
    firstname VARCHAR(254),
    middlename VARCHAR(254),
    lastname VARCHAR(254),
    nationality VARCHAR(2),
    flag VARCHAR(254),
    lastlogin DATE,
    birthdate DATE,
    photo VARCHAR(254),
    simulators VARCHAR(254),
    bankroll DECIMAL(11,2),
    skill INT,
    attacking INT,
    defending INT,
    reliability INT,
    teamplayer INT,
    fairplay INT,
    knowledge INT,
    evalcounter INT,
    active BOOLEAN,

    function render($f3) {
       $template = new Template;
       echo $template->render('login.html');
    }

}
