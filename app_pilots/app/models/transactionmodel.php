<?php

/**
 * @author Francisco Costa <zoom.franciscocosta@gmail.com>
 * @package Models
 */

class TransactionModel extends Model {

    public function __construct() {
        parent::__construct();
        $this->mapDbTable('transactions');
        $this->transactiondata = $this->dbdata;
    }

    protected function readFunds() {
        $teste = 'fff';
    }
    
    protected function readTransactionValue(){
        
    }
    
    protected function checkFunds(){
        
    }
    

}
