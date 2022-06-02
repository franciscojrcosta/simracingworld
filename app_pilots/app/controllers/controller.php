<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Controllers
 */
class Controller {

    protected $f3;          //! fat-free framework instance
    protected $template;    //! template instance
    protected $authmodel;
    protected $validsession;

    /**
     * Initialize Template object
     * Initialize Framework object
     */
    public function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->template = new Template;
        $this->authmodel = new AuthModel;
    }

    /**
     * starts the login process
     * sets session id, user and session type
     */
    public function doLogin() {
        if ($this->authmodel->login() == true) {
            session_start();
            $_SESSION['id'] = session_id();
            $_SESSION['user'] = $this->authmodel->username;
            $_SESSION['email'] = $this->authmodel->email;
            $this->f3->set('sessionid', $_SESSION['id']);
            $this->f3->set('username', $_SESSION['user']);
            $this->f3->set('email', $_SESSION['email']);
            $this->f3->set('timedate', date('d-m-Y H:m:s'));
            echo $this->template->render('dashboard.html'); //open dashboard
        }
    }
    
    /**
     * 
     * @param string $fileToUpload
     * @param string $filetype
     * @param string $destination
     */
    public function doUpload($fileToUpload, $filetype, $destination){
        print_r ($fileToUpload);
        echo $filetype;
        echo $destination;
    }

}