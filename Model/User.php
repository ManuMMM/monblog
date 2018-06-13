<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Manu
 */
class User {
    
    private $_id;
    private $_username;
    private $_passwordHash;
    private $_email;
    private $_inscriptionDate;
    private $_tokenSession;
    private $_idAccreditationLevel;
    
    // Contructor //
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }
    
    // Hydratation //
    
    public function hydrate($data) {
        foreach ($data as $key => $value){
            // Define the name of the corresponding method
            $method = 'set' . ucfirst($key);
            // Check if a such method exist
            // method_exists(object, 'method name')
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    // Functions reflecting the functionnalities of the user //
        
    // GETTERS //
    
    public function getId() {
        return $this->_id;
    }
    
    public function getUsername() {
        return $this->_username;
    }
    
    public function getPasswordHash() {
        return $this->_passwordHash;
    }
    
    public function getEmail() {
        return $this->_email;
    }
    
    public function getInscriptionDate() {
        return $this->_inscriptionDate;
    }
    
    public function getTokenSession() {
        return $this->_tokenSession;
    }
    
    public function getIdAccreditationLevel() {
        return $this->_idAccreditationLevel;
    }
    
    // SETTERS //
    
    // Test if the $id is an integrer & stock it in $_id
    public function setId($id) {
        $ID = (int) $id;
        if($ID > 0){
            $this->_id = $ID;
        }
    }
    
    // Test if the $username is a string and if the length is > 1 and <= 30 & stock it in $_username
    public function setUsername($username) {
        if(is_string($username)){
            if((strlen(utf8_decode($username))) > 1 && (strlen(utf8_decode($username))) <= 30){
                $this->_username = $username;
            }
        }
    }
    
    // Test if the $passwordHash is a string and stock it in $_password    
    public function setPasswordHash($passwordHash = NULL) {
        if(is_string($passwordHash)){
            $this->_passwordHash = $passwordHash;
        }
    }
    
    // Test if the $email has the right format & and if true, stock it in $_email
    public function setEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE)) {
            $this->_email = $email;
        }
    }
    
    // Test if the $date has the right format & stock it in $_date
    // If the parameter $data is an empty string (default value), the current date will be stocked
    public function setInscriptionDate($date = '') {
        if(is_string($date)) {
            $format = 'Y-m-d H:i:s';	
            $datecheck = DateTime::createFromFormat($format, $date);
            if($datecheck){
                $datecheck = $datecheck->format($format);
                if($datecheck == $date){
                        $this->_date = $date;
                }
            } else {
                $this->_date = date("Y-m-d H:i:s");
            }
        }
    }
    
    // Test if the $token_session a string and if the length is > 1 and <= 255 & stock it in $_tokenSession
    public function setTokenSession($token_session) {
        if(is_string($token_session)){
            if((strlen(utf8_decode($token_session))) > 1 && (strlen(utf8_decode($token_session))) <= 255){
                $this->_tokenSession = $token_session;
            }
        }
    }
    
    // Test if the $idaccreditationlevel is an integrer & stock it in $_idaccreditationlevel
    public function setIdAccreditationLevel($idaccreditationlevel = 7) {
        $ID = (int) $idaccreditationlevel;
        $this->_idAccreditationLevel = $ID;
    }
    
}
