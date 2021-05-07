<?php

/*
 * Copyright (C) 2021 SimRacingWorld by Francisco Costa
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of auth
 *
 * @author franc
 */

class SRW_PassEnc {
    
    public $activationkey;
    public $hashedpassword;
    
    /**
     * Generates the unique id for the activation key
     * @return string Sactivationkey
     */
    function genActivationKey() {
        $this->activationkey = uniqid();
        return $this->activationkey;
    }

    function checkActivationKey() {
        
    }
    
    /**
     * Encrypts a given password
     * @param string $password original password to be encrypted
     * @return string $hashedpassword password after encryption
     */
    function encryptPassword($password){
       $this->hashedpassword = password_hash($password, PASSWORD_DEFAULT);
       return $this->hashedpassword;
    }

}