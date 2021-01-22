<?php

class Controller {

    protected $f3;
    protected $db;
    protected $template;

    function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->template = new Template();
        
        $db = new DB\SQL(
                'mysql:host=localhost;port=3306;dbname=simracingworld',
                'root',
                'Redbaron');
        $this->db=$db;
    }

    function beforeroute() {
        //echo 'Before routing - ';
    }

    function afterroute() {
        //echo '- After routing';
    }

}
