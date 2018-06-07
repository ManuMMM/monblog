<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ControllerRegister {
    
    // Show the signin page
    public function signIn() {
        $view = new View('inscription');
        $view->generate();
    }
    
    // Show the signin page
    public function logIn() {
        $view = new View('login');
        $view->generate();
    }
    
}