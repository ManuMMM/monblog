<?php
// We start the session
session_start();

// Load the Autolader (which will manage to load the required class when needed)
// require_once() statement is identical to require()
// except PHP will check if the file has already been
// included, and if so, not include (require) it again.
require_once 'Autoloader.php';
Autoloader::register();

if(isset($_SESSION['session'])){
    $user = new User($_SESSION['session']);
}
elseif (isset($_COOKIE['session'])){
    $usermanager = new UserManager(); // Create a new instance of Usermanager
    $user = $usermanager->getUser($_COOKIE['session']['username']); // Get the user with the username stocked in the cookie 'session'
    $token_session_hash = $user->getTokenSession(); // Get the hash of the session token of this user and save it in $token_session_hash
    // Compare if the hash of the session token from the cookie is the same as the one stocked in the database
    // If it's true, it loads all the $_COOKIE['session'] in a $_SESSION['session']
    if($usermanager->verify($_COOKIE['session']['token_session'], $token_session_hash)){
        foreach ($_COOKIE['session'] as $key => $value) {
            $_SESSION['session'][$key] = $value;
        }
    }
}
 else {
    $_SESSION['session']['accreditation'] = 7;
}

$_SESSION['focus']['username'] = FALSE;
$_SESSION['focus']['password'] = FALSE;
$_SESSION['focus']['passwordConfirmation'] = FALSE;
$_SESSION['focus']['email'] = FALSE;

$router = new Router();
$router->routeRequest();