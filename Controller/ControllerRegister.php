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
    
    // Sign in
    public function signin($username, $password, $passwordConfirmation, $email) {
        $data = [];
        $registration = $this->userManager->signin($username, $password, $passwordConfirmation, $email);
        if($registration === TRUE){
            $data['state'] = 'success';
            $data['return'] = '<strong>Vous êtes maintenant inscrit, un email qui vient de vous être envoyé pour activer votre compte.</strong>';
        }else{
            $data['state'] = 'fail';
            $data['return'] = $registration;
        }
        echo json_encode($data);
    }
    
    // Log in
    public function login($username, $password) {
        $data = [];
        $logged = $this->userManager->login($username, $password);
        if($logged === TRUE){
            $data['state'] = 'success';
            $data['return'] = '<strong>Vous êtes maintenant connecté ! Bienvenue ' . $username . ' !</strong>';
        }else{
            $data['state'] = 'fail';
            $data['return'] = $logged;
        }
        echo json_encode($data);
    }
    
    // Log out
    public function logout() {
        $this->userManager->logout();
    }
    
    public function activation($username, $token_session) {
        $data = [];
        $registered = $this->userManager->emailActivation($username, $token_session);
        if($registered === TRUE){
            $data['state'] = 'success';
            $data['return'] = '<strong>Votre compte est maintenant actif, vous pouvez vous connecter dès à présent !</strong>';
        }else{
            $data['state'] = 'fail';
            $data['return'] = $registered;
        }
        echo json_encode($data);
    }
    
}