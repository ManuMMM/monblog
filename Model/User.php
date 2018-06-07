<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Manu
 */
abstract class User {
    
    protected $_id;
    protected $_username;
    protected $_email;
    protected $_inscriptionDate;
    protected $_tokenConnexion;
    protected $_idCategory;
    
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
    
    public function getEmail() {
        return $this->_email;
    }
    
    public function getInscriptionDate() {
        return $this->_inscriptionDate;
    }
    
    public function getTokenConnexion() {
        return $this->_tokenConnexion;
    }
    
    public function getIdCategory() {
        return $this->_idCategory;
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
    
    // Test if the $email has the right format & stock it in $_email
    public function setEmail($email) {
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
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
    
    // Test if the $token_connection a string and if the length is > 1 and <= 255 & stock it in $_tokenConnection
    public function setTokenConnexion($token_connexion) {
        if(is_string($token_connexion)){
            if((strlen(utf8_decode($token_connexion))) > 1 && (strlen(utf8_decode($token_connexion))) <= 255){
                $this->_tokenConnexion = $token_connexion;
            }
        }
    }
    
    // Test if the $idCategory is an integrer & stock it in $_idCategory
    public function setIdCategory($idCategory) {
        $ID = (int) $idCategory;
        $this->_idCategory = $ID;
    }
    
}
