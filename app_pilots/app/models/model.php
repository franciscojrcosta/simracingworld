<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
 */
class Model {

    protected $f3;          //! Framework Instance
    protected $appdatabase; //! Database Instance
    protected $template;    //! Template Instance
    protected $dbdata;      //! Table Object

    /**
     * set the framework instance $f3
     * set the template instance $template
     */
    public function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->template = new Template();
        $this->connectMySQL();
        $this->mapDbTable('pilots');
    }

    /**
     * Maps database table to object $dbdata
     * $dbtable is the name of database table to be mapped
     */
    protected function mapDbTable($dbtable) {
        $dbdata = new DB\SQL\Mapper($this->appdatabase, $dbtable);
        $this->dbdata = $dbdata;
    }

    /**
     * Connects to MySQL database
     * SYSDB, DBUSERNAME, DBPASSWORD are in the config.ini
     */
    protected function connectMySQL() {
        $appdatabase = new DB\SQL(
                $this->f3->get('SYSDB'), //key SYSDB is at config.ini
                $this->f3->get('DBUSERNAME'), //key DBUSERNAME is at config.ini
                $this->f3->get('DBPASSWORD')); //key DBPASSWORD is at config.ini
        $this->appdatabase = $appdatabase;
    }

    /**
     * gets data from database 
     */
    public function getByEmail($email) {
        $this->dbdata->load(array('email=?', $email));
        if ($this->dbdata->dry()) {
            $this->dbdata = false;
            return $this->dbdata;
        } else {
            return $this->dbdata;
        }
    }

    /**
     * Encrypts a given password
     * @param string $password original password to be encrypted
     * @return string $hashedpassword password after encryption
     */
    public function encryptPassword($password) {
        $this->hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->hashedpassword;
    }
    
    /**
     * Save the new encrypted password in to database
     * @param type $password
     */
    public function setNewPassword($password) {  
        $password = $this->encryptPassword($password);
        $this->dbdata->password = $password;
        $this->dbdata->save();
    }

}
