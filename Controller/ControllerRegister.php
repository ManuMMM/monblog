<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ControllerRegister {
    
    private $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }
    
    // Log out
    public function logout() {
        $this->userManager->logout();
    }
    
}