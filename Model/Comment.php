<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author Manu
 */
class Comment {
    private $_idComment;
    private $_date;
    private $_author;
    private $_content;
    private $_idPost;
    
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
    
    public function getIdComment() {
        return $this->_idComment;
    }
    
    public function getDate() {
        return $this->_date;
    }
    
    public function getAuthor() {
        return $this->_author;
    }
    
    public function getContent() {
        return $this->_content;
    }
    
    public function getIdPost() {
        return $this->_idPost;
    }
    
    // SETTERS // validate & set the values (do not sanitize them) //
    
    // Test if the id is an integrer & stock it in $_id
    public function setIdComment($id) {
        $ID = (int) $id;
        if($ID > 0){
            $this->_idComment = $ID;
        }
    }
    
    // Test if the date has the right format & stock it in $_date
    // If the parameter $data is an empty string (default value), the current date will be stocked
    public function setDate($date = '') {
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
    
    // Test if the title is a string and if the length is >1 and <100 & stock it in $_title
    public function setAuthor($author) {
        if(is_string($author)){
            if((strlen(utf8_decode($author))) > 1 && (strlen(utf8_decode($author))) < 100){
                $this->_author = $author;
            }
        }
    }
    
    // Test if the content is a string and if the length is >1 and <400 & stock it in $_content
    public function setContent($content) {
        if(is_string($content)){
            if((strlen(utf8_decode($content))) > 1 && (strlen(utf8_decode($content))) < 200){
                $this->_content = $content;
            }
        }
    }
    
    // Test if the id is an integrer & stock it in $_idPost
    public function setIdPost($idPost) {
        $ID = (int) $idPost;
        if($ID > 0){
            $this->_idPost = $ID;
        }
    }
    
}