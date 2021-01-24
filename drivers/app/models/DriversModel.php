<?php

class Drivers extends DB\SQL\Mapper{

    public function __construct(\DB\SQL $db) {
        parent::__construct($db, 'drivers');
    }
    
    public function getByID($id){
        $this->load(array('driverid=?',$id));
        return $this->query;
    }
   
}