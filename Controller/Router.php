<?php

/**
 * Description of Router
 *
 * @author Manu
 */

require_once 'Controller/ControllerHome.php';
require_once 'Controller/ControllerPost.php';
require_once 'View/View.php';

class Router {
    
    private $ctrlHome;
    private $ctrlPost;

    public function __construct() {
        $this->ctrlHome = new ControllerHome();
        $this->ctrlPost = new ControllerPost();
        $this->action = $this->getParameter($_GET, 'action');
    }

    // Process an incoming request
    public function routeRequest() {
        try {
            if ($this->action == 'post') {
                $idPost = intval($this->getParameter($_GET, 'id'));
                if ($idPost != 0) {
                    $this->ctrlPost->post($idPost);
                }
                else
                  throw new Exception("Invalid post ID");
            }
            else if ($this->action == 'comment') {
                $author = $this->getParameter($_POST, 'author');
                $content = $this->getParameter($_POST, 'content');
                $idPost = $this->getParameter($_POST, 'id');
                $this->ctrlPost->comment($author, $content, $idPost);
            }
            elseif ($this->action == NULL) {
                $this->ctrlHome->home();
            }
            else
                throw new Exception("Invalid action");
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
  
    // Search a parameter in an array
    private function getParameter($array, $name) {
        if (isset($array[$name])) {
            return $array[$name];
        }
        else
            return NULL;
    }

    // Show an error
    private function error($msgError) {
        $view = new View("Error");
        $view->generate(array('msgError' => $msgError));
    }
    
}