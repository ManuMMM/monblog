<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author Manu
 */
class Post {
    
    private $_idPost;
    private $_date;
    private $_title;
    private $_content;
    
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
    
    // Functions reflecting the functionnalities of the post //
    
    // GETTERS //
    
    public function getIdPost() {
        return $this->_idPost;
    }
    
    public function getDate() {
        return $this->_date;
    }
    
    public function getTitle() {
        return $this->_title;
    }
    
    public function getContent() {
        return $this->_content;
    }
    
    // SETTERS // validate & set the values (do not sanitize them) //
    
    // Test if the id is an integrer & stock it in $_idPost
    public function setId($id) {
        $ID = (int) $id;
        if($ID > 0){
            $this->_idPost = $ID;
        }
    }
    
    // Test if the date has the right format & stock it in $_date
    // If the parameter $data is an empty string (default value), the current date will be stocked
    public function setDate($date = '') {
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
    
    // Test if the title is a string and if the length is >1 and <100 & stock it in $_title
    public function setTitle($title) {
        if(is_string($title)){
            if((strlen(utf8_decode($title))) > 1 && (strlen(utf8_decode($title))) < 100){
                $this->_title = $title;
            }
        }
    }
    
    // Test if the content is a string and if the length is >1 & stock it in $_content
    public function setContent($content) {
        if(is_string($content)){
            if((strlen(utf8_decode($content))) > 1){
                $this->_content = $content;
            }
        }
    }

}
