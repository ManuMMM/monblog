<?php

class UserManager extends Model {
    
    public function signin(User $user) {
        $sql = 'INSERT INTO t_users(username, password_hash, email, inscription_date, accreditation_id) VALUES(?, ?, ?, NOW(), ?)';
        $this->executeRequest($sql, [$user->getUsername(), $user->getPasswordHash(), $user->getEmail(), 7]);
    }
    
    // Check if the username & password are correct & then, grant access
    public function login($username, $password) {
        $user = $this->getUser($username);
        if(isset($user)){
            $passwordhash = $user->getPasswordHash();
            // Check if the password is correct
            if($this->verify($password, $passwordhash)){
                // Create a token
                $token_session = $this->token();
                // Save its hash in the database under the username profile
                $token_session_hash = $this->hash($token_session);
                $sql = 'UPDATE t_users SET token_session = ? WHERE username = ?';
                $req = $this->executeRequest($sql, [$token_session_hash, $user->getUsername()]);
                // Save the current profile in session variables
                $_SESSION['session']['id'] = $user->getId();
                $_SESSION['session']['username'] = $user->getUsername();
                $_SESSION['session']['email'] = $user->getEmail();
                $_SESSION['session']['inscription_date'] = $user->getInscriptionDate();
                $_SESSION['session']['token_session'] = $token_session;
                $_SESSION['session']['accreditation'] = $user->getIdAccreditationLevel();
                // If the "remember me" is ticked, stock 6 cookies
                if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == TRUE){
                    setcookie('session[token_session]', $_SESSION['session']['token_session'], time() + 365*24*3600, null, null, false, true);
                    setcookie('session[username]', $_SESSION['session']['username'], time() + 365*24*3600, null, null, false, true);
                    setcookie('session[id]', $_SESSION['session']['id'], time() + 365*24*3600, null, null, false, true);
                    setcookie('session[email]', $_SESSION['session']['email'], time() + 365*24*3600, null, null, false, true);
                    setcookie('session[inscription_date]', $_SESSION['session']['inscription_date'], time() + 365*24*3600, null, null, false, true);
                    setcookie('session[accreditation]', $_SESSION['session']['accreditation'], time() + 365*24*3600, null, null, false, true);
                }
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }
    
    // Log out (unset the current session & destroy cookies)
    public function logout() {
        // If connected, deconnection & redirection to the homepage
        if(isset($_SESSION['session'])){
            // ------------------------------------------------------------------------------------------------
            // -------------------------- Delete session variables & the session ------------------------------
            // ------------------------------------------------------------------------------------------------
            // Unset all of the session variables.
            $_SESSION = array();
            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            }
            // Destroy the session.
            session_destroy();
            // ------------------------------------------------------------------------------------------------
            // -------------------------- Delete all the cookies ----------------------------------------------
            // ------------------------------------------------------------------------------------------------
            // http://php.net/manual/fr/function.setcookie.php
            
            if (isset($_COOKIE['session']['token_session'])) {
                unset($_COOKIE['session']['token_session']);
                // empty value and old timestamp
                setcookie('session[token_session]', '', time() - 3600, null, null, false, true);
            }
            if (isset($_COOKIE['session']['username'])) {
                unset($_COOKIE['session']['username']);
                // empty value and old timestamp
                setcookie('session[username]', '', time() - 3600, null, null, false, true);
            }
            if (isset($_COOKIE['session']['id'])) {
                unset($_COOKIE['session']['id']);
                // empty value and old timestamp
                setcookie('session[id]', '', time() - 3600, null, null, false, true);
            }
            if (isset($_COOKIE['session']['email'])) {
                unset($_COOKIE['session']['email']);
                // empty value and old timestamp
                setcookie('session[email]', '', time() - 3600, null, null, false, true);
            }
            if (isset($_COOKIE['session']['inscription_date'])) {
                unset($_COOKIE['session']['inscription_date']);
                // empty value and old timestamp
                setcookie('session[inscription_date]', '', time() - 3600, null, null, false, true);
            }
            if (isset($_COOKIE['session']['accreditation'])) {
                unset($_COOKIE['session']['accreditation']);
                // empty value and old timestamp
                setcookie('session[accreditation]', '', time() - 3600, null, null, false, true);
            }
            // ------------------------------------------------------------------------------------------------
            
            // Redirection to the homepage
            header('location:index.php?action=');
        }
    }
    
    public function getUser($username) {
        $sql = 'SELECT id, username, password_hash as passwordHash, email, inscription_date as inscriptionDate, token_session as TokenSession, accreditation_id as idAccreditationLevel'
             . ' FROM t_users'
             . ' WHERE username = ?';
        $req = $this->executeRequest($sql, array($username));
        if ($req->rowCount() == 1){
            $data = $req->fetch();  // Access to the first result line
            return new User($data);
        }else{
            throw new Exception("Pas d'identifiant correspondant à '$username'");
        }
    }
            
    public function delete(User $user) {
        // Delete an user
    }
    
    // Check if the Username is already existing in the database, return false if any result found, otherwise return true.
    public function validUsername($username) {
        $sql = 'SELECT * FROM t_users WHERE username = ?';
        $req = $this->executeRequest($sql, [$username]);
        if ($req->rowCount() == 0){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function modifyAccreditationLevel(User $user) {
        // Give or remove permission(s) to the specified User
    }

    public function editUsername(User $user) {
        // Allow to modify an Username
    }

    private function token($length = 64) {
        // Create a token of the given length
        $token = bin2hex(random_bytes($length));
        return $token;
    }
    
    public function verify(string $string, $hash) {
        // Comparing input string hash with the database hash and returning it
        return (password_verify ($string , $hash));
    }
        
    private function hash(string $string) {
        // Return the hash of the given string
        $hash = password_hash($string, PASSWORD_DEFAULT);
        return $hash;
    }
    
}

