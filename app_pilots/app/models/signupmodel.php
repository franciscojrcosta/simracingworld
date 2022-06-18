<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
 */
class SignupModel extends Model {
    
    /* a trait for file uploads */
    use ImageUpload;

    private object $authmodel;
    private string $filename;

    public function __construct() {
        parent::__construct();
        $this->authmodel = new AuthModel();
    }

    public function initSignup() {
        $destination = $this->f3->get('PILOTSIMG');
        if ( $_FILES['fileToUpload']['name'] <> NULL) { //! reads from signup form the file to upload 
            $this->filename = $this->initUpload($_FILES['fileToUpload'],$destination);
        } else {
            $this->filename = 'generic.jpg'; //! if no file is loaded the generic.jpg is used 
        }
        $this->initData();
        $this->createPilot();
        $this->authmodel->sendActivationKey($this->email, $this->activationkey);
    }

    /**
     * initializes data from data received from registration form
     * encrypt the password
     * generates an activation token
     */
    protected function initData() {
        $this->email = filter_input(INPUT_POST, 'txtEmail');
        $this->password = filter_input(INPUT_POST, 'txtPassword');
        $this->firstname = filter_input(INPUT_POST, 'txtFirstName');
        $this->middlename = filter_input(INPUT_POST, 'txtMiddleName');
        $this->lastname = filter_input(INPUT_POST, 'txtLastName');
        $this->birthdate = filter_input(INPUT_POST, 'dateBirthDate');
        $this->registrationdate = date("Y-m-d");
        $this->nationality = filter_input(INPUT_POST, 'txtNationality');
        $this->flag = strtolower($this->nationality) . ".png";
        $this->photo = $this->filename;
        $this->active = false;
        $this->activationkey = $this->authmodel->createActivationKey(); /* Generates activation key */
        $this->password = $this->authmodel->encryptPassword($this->password); /* Encrypts the password */
    }

    /**
     * Saves the data
     */
    protected function createPilot() {
        $this->dbdata->email = $this->email;
        $this->dbdata->password = $this->password;
        $this->dbdata->firstname = $this->firstname;
        $this->dbdata->middlename = $this->middlename;
        $this->dbdata->lastname = $this->lastname;
        $this->dbdata->birthdate = $this->birthdate;
        $this->dbdata->registrationdate = $this->registrationdate;
        $this->dbdata->nationality = $this->nationality;
        $this->dbdata->flag = $this->flag;
        $this->dbdata->photo = $this->photo;
        $this->dbdata->active = $this->active;
        $this->dbdata->activationkey = $this->activationkey;
        $this->dbdata->save(); //saves all the data to db
        $this->dbdata->reset(); //clean up the stored variables and prepares for new data
    }

}