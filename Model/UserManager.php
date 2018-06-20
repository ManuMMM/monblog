<?php

class UserManager extends Model {
    
    // Check the inputs, save the user profil in a temporary table & sent an email for confirmation (activation)
    public function signin($username, $password, $passwordConfirmation, $email) {
        // Checking if the email is correct
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
            // Check that pass & passconfirmation are the same
            if($password == $passwordConfirmation) {
                // Checking if the username is unique
                $usermanager = new UserManager();
                $checked = $usermanager->validUsername($username);
                if($checked){
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    // Create a token
                    $token_session = $this->token();
                    // Save its hash in the database under the username profile
                    $token_session_hash = $this->hash($token_session);
                    $user = new User(array('username' => $username, 'passwordHash' => $passwordHash, 'email' => $email, 'tokenSession' => $token_session_hash));
                    $sql = 'INSERT INTO t_users_temporary(username, password_hash, email, inscription_date, token_session, accreditation_id) VALUES(?, ?, ?, NOW(), ?, ?)';
                    $this->executeRequest($sql, [$user->getUsername(), $user->getPasswordHash(), $user->getEmail(), $user->getTokenSession(), 7]);
                    $this->sendConfirmationEmail($user->getUsername(), $user->getEmail(), $token_session);
                    return TRUE;
                }
                else {
                    $error = "Cet identifiant est déjà utilisé";
                    return $error;
                }
            }
            else {
                $error = "Vos mots de passe ne sont pas identique.";
                return $error;
            }
        } else {
            $error = "Votre adresse e-mail n'est pas valide.";
            return $error;
        }
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
                $error = "Mot de passe incorrect";
                return $error;
            }
        }
        else {
            $error = "Identifiant introuvable";
            return $error;
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
    
    // Send an email with a link for activation of the user
    public function sendConfirmationEmail($username, $email, $token_session) {
        // Receiver
        $to = $email;
        // Subject
        $subject = 'Billet pour L\'Alaska.com - Confirmation de votre email';
        // Activation link
        $activationLink = 'http://localhost/Sites/monblog/index.php?action=emailactivation&username='.urlencode($username).'&key='.urlencode($token_session);
        // Message
        $message =
            '<td background="https://i.pinimg.com/736x/4e/37/9e/4e379eea186223194f7ee4a8b0a0cb3e--lofoten-scotland.jpg" bgcolor="rgba(51, 53, 52, 0.7)" width="500" height="500" valign="top">
                <!--[if gte mso 9]>
                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:500px;height:500px;">
                    <v:fill type="tile" src="https://i.pinimg.com/736x/4e/37/9e/4e379eea186223194f7ee4a8b0a0cb3e--lofoten-scotland.jpg" color="whitesmoke" />
                    <v:textbox inset="0,0,0,0">
                <![endif]-->
                <div>
                    <div style="display:block; width:400px; height:400px; margin:50px auto; padding:20px; background: rgba(51, 53, 52, 0.7); color:whitesmoke;"><h1 style="text-align:center;">Un billet pour l\'Alaska</h1><br><br>     
                    <p>Merci de votre inscription à un billet pour l\'Alaska. Une dernière étape pour vous compter parmi nous ! Afin d\'activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.</p><br><br>
                    <a style="display: block; color: #fff; background-color: #007bff; border-color: #007bff; min-height: 40px; border-radius: 3px; margin:auto; padding: .5rem 1rem; font-size: 1.25rem; text-align: center; vertical-align: middle; line-height: 1.5; max-width: 350px;" href="'.$activationLink.'">Lien d\'activation</a><br><br>
                    <p style="text-align:center;">--------------------------------------------------------------------------------------<br>
                    Ceci est un mail automatique, Merci de ne pas y répondre.<br></div></p>
                </div>
                <!--[if gte mso 9]>
                    </v:textbox>
                    </v:rect>
                <![endif]-->
            </td>';
        // Mail HTML => header Content-type must be defined
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';
        // Additional headers
        $headers[] = 'From: jean.forteroche1954@gmail.com';
        // Send
        mail($to, $subject, $message, implode("\r\n", $headers));
    }
    
    // Check if the activation from a confirmation link has the correct key, and, if so, save the user profile in the database & delete the one in the temporary table
    public function emailActivation($username, $token_session) {
        $sql = 'SELECT username, password_hash as passwordHash, email, inscription_date as inscriptionDate, token_session as TokenSession, accreditation_id as idAccreditationLevel FROM t_users_temporary WHERE username = ?';
        $req = $this->executeRequest($sql, array($username));
        if ($req->rowCount() == 1){
            $data = $req->fetch();
            $user = new User($data);
            $token_session_hash = $user->getTokenSession();
            if($this->verify($token_session, $token_session_hash)){
                $sql = 'INSERT INTO t_users(username, password_hash, email, inscription_date, accreditation_id) VALUES(?, ?, ?, NOW(), ?)';
                $this->executeRequest($sql, [$user->getUsername(), $user->getPasswordHash(), $user->getEmail(), 7]);
                $sql2 = 'DELETE FROM t_users_temporary WHERE username = ?';
                $this->executeRequest($sql2, array($username));
                return TRUE;
            }else{
                $error = 'Clé de validation incorrecte';
                return $error;
            }
        }else{
            $error = 'Utilisateur introuvable';
            return $error;
        }
    }
    
    // Get the user from the database with the given username 
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
        $sql = 'DELETE FROM t_post WHERE BIL_ID = ?';
        $this->executeRequest($sql, array($idPost));
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

