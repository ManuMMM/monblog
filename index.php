<?php
// Load the Autolader (which willmanage to load the required class when needed)
// require_once() statement is identical to require()
// except PHP will check if the file has already been
// included, and if so, not include (require) it again.
require_once 'Autoloader.php';
Autoloader::register();

require 'Controller/Router.php';

$router = new Router();
$router->routeRequest();