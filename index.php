<?php
// We start the session
session_start();

// Load the Autolader (which will manage to load the required class when needed)
// require_once() statement is identical to require()
// except PHP will check if the file has already been
// included, and if so, not include (require) it again.
require_once 'Autoloader.php';
Autoloader::register();

$router = new Router();
$router->routeRequest();