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
            if($registration['type'] === 'username'){
                $data['errorUsername'] = '<p class="error" style="color:red; text-align:center; padding:10px; margin-bottom: -1rem;">' . $registration['message'] . '</p>';
            }
            if ($registration['type'] === 'password') {
                $data['errorPassword'] = '<p class="error" style="color:red; text-align:center; padding:10px; margin-bottom: -1rem;">' . $registration['message'] . '</p>';
            }
            if ($registration['type'] === 'email') {
                $data['errorEmail'] = '<p class="error" style="color:red; text-align:center; padding:10px; margin-bottom: -1rem;">' . $registration['message'] . '</p>';
            }
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
            if($logged['type'] === 'username'){
                $data['errorUsername'] = '<p class="error" style="color:red; text-align:center; padding:10px; margin-bottom: -1rem;">' . $logged['message'] . '</p>';
            }
            if ($logged['type'] === 'password') {
                $data['errorPassword'] = '<p class="error" style="color:red; text-align:center; padding:10px; margin-bottom: -1rem;">' . $logged['message'] . '</p>';
            }
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
            $_SESSION['state'] = 'success';
            $_SESSION['return'] = '<strong>Votre compte est maintenant actif, vous pouvez vous connecter dès à présent !</strong>';
        }else{
            $_SESSION['state'] = 'fail';
            $_SESSION['return'] = $registered;
        }
        header('location:index.php');
    }
    
}