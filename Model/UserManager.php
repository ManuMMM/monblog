<?php

class UserManager extends Model {
    
    public function signin(User $user) {
        
    }
    
    public function login(User $user) {
        // Check if the username & password are correct & then, grant access
        $sql = 'SELECT * FROM t_users WHERE username = ?';
        $req = $this->executeRequest($sql, $user->getUsername());
        $count = $req->rowCount(); // Do rowCount() on the request, it returns a value > 0 if there is a match. We stock in a variable $count
        if($count != 0){            
            $data = $req->fetch();  // Access to the first result line
            $passwordhash = $data['passwordhash'];
            // Check if the password is correct
            if($this->verify($user->getPassword(), $passwordhash)){
                // Create a token
                $token_connection = $this->token();
                // Save its hash in the database under the username profile
                $token_connection_hash = $this->hash($token_connection);
                $sql = 'UPDATE t_users SET token_connection = ? WHERE username = ?';
                $req = $this->executeRequest($sql, [$token_connection, $user->getUsername()]);
                // Save the current profile in session variables
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['email'] = $data['email'];
                $_SESSION['inscription_date'] = $data['inscription_date'];
                $_SESSION['token_connexion'] = $token_connection;
                $_SESSION['id_category'] = $data['id_category'];
                // If the "remember me" is ticked, stock 2 cookies (one )
                if($_POST['rememberMe']){
                    setcookie('tokenSession', $token_connection, time() + 365*24*3600, null, null, false, true);
                    setcookie('username', $user->getUsername(), time() + 365*24*3600, null, null, false, true);
                }
            }
        }
    }
    
    public function logout(User $user) {
        // Log out
    }
        
    public function delete(User $user) {
        
    }
    
    private function token($length = 64) {
        // Create a token of the given length
        $token = bin2hex(random_bytes($length));
        return $token_connection;
    }
    
    private function verify(string $string, $hash) {
        // Comparing input string hash with the database hash and returning it
        return (password_verify ($string , $hash));
    }
        
    private function hash(string $string) {
        // Return the hash of the given string
        $hash = password_hash($string, PASSWORD_DEFAULT);
        return $hash;
    }
    
}

